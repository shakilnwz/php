<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);
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
