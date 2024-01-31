<?php

use Core\Database;

//requiring the functions at the top of the page

$config = require base_path("config.php");
$db = new Database($config['Database'], "root", "AHsy@9186");

$currentUser = 2;

$note = $db->query(
    "select * from notes where id = :id ;",
    [':id' => $_GET['id']]
)->findOrFail();

authorize($note['user_id'] === $currentUser);

view('notes/show.view.php', [
    'header' => 'Note',
    'note' => $note

]);
