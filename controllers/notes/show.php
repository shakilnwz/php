<?php

use Core\Database;

//requiring the functions at the top of the page


$config = require base_path("config.php");
$db = new Database($config['Database'], "root", "AHsy@9186");

$currentUser = 2;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $note = $db->query(
        "select * from notes where id = :id ;",
        [':id' => $_GET['id']]
    )->findOrFail();

    authorize($note['user_id'] === $currentUser);

    $db->query(
        "delete from notes where id = :id ;",
        [':id' => $_GET['id']]
    );

    header('location: /notes');
    exit();
} else {

    $note = $db->query(
        "select * from notes where id = :id ;",
        [':id' => $_GET['id']]
    )->findOrFail();

    authorize($note['user_id'] === $currentUser);


    view('notes/show.view.php', [
        'header' => 'Note',
        'note' => $note

    ]);
}
