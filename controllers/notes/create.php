<?php

use Core\Database;
use Core\Validator;



$config = require base_path("config.php");
$db = new Database($config['Database'], "root", "AHsy@9186");
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!Validator::string($_POST['body'], 1, 100)) {
        $errors['body'] = "A Note no less than 100 character is required.";
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes (body, user_id) VALUES ( :body , :user_id)', [
            'body' => $_POST["body"],
            'user_id' => 2
        ]);
    }
}


view('notes/create.view.php', [
    'header' => 'Create Note',
    'errors' => $errors
]);
