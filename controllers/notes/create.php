<?php

require('Validator.php');

$header = 'Create Note';


$config = require "config.php";
$db = new Database($config['Database'], "root", "AHsy@9186");

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    $errors = [];

    if(!Validator::string($_POST['body'], 1, 100)){
        $errors['body'] = "A Note no less than 100 character is required.";
    }

    if(empty($errors)){
        $db->query('INSERT INTO notes (body, user_id) VALUES ( :body , :user_id)', [
            'body' => $_POST["body"],
            'user_id' => 2
        ]);
    }
}



require "views/notes/create.view.php";
