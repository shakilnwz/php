<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

//  validate
$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

// authenticate
$signedIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);

if (!$signedIn) {
    // add to error if authentication fails.
    $form->error('email', 'No user found for that email or password.')->throw();
}
// redirect to home after logging in
redirect('/');
