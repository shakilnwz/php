<?php

use Core\App;
use Core\Database;
use Core\Validator;

// get data from  the $_POST superglobal
$email = $_POST['email'];
$password = $_POST['password'];

// validate the inputs
$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}
if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Password must be 7 characters or more.';
}
// if error is not empty
if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
    ]);
}

// check if the account already exist
$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    // if yes then redirect to the login page
    // user already exist please log in 
    header('location: /');
    exit();
} else {
    // if not then save the login info, log in the user, and redirect 
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => $password
    ]);

    // update the session to mark user has logged in 
    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
    exit();
}
