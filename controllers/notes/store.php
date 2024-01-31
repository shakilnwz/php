<?php

use Core\Database;
use Core\Validator;

$config = require base_path("config.php");
$db = new Database($config['Database'], "root", "AHsy@9186");
$errors = [];

if (!Validator::string($_POST['body'], 1, 100)) {
    $errors['body'] = "A Note no less than 100 character is required.";
}

if (!empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => "Create Note",
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes (body, user_id) VALUES ( :body , :user_id)', [
    'body' => $_POST["body"],
    'user_id' => 2
]);

header('location: /notes');
die();
