<?php

$header = 'Create Note';


$config = require "config.php";
$db = new Database($config['Database'], "root", "AHsy@9186");

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $db->query('INSERT INTO notes (body, user_id) VALUES ( :body , :user_id)', [
        'body' => $_POST["body"],
        'user_id' => 2
    ]);
}



require "views/note-create.view.php";
