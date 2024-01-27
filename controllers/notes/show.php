<?php

use Core\Database;

//requiring the functions at the top of the page


$config = require base_path("config.php");
$db = new Database($config['Database'], "root", "AHsy@9186");


$note = $db->query("select * from notes where id = :id ;", [':id' => $_GET['id']])->findOrFail();

$currentUser = 2;

authorize($note['user_id'] === $currentUser);


view('notes/show.view.php', [
    'header' => 'Note',
    'note' => $note

]);
