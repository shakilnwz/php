<?php

use Core\Database;
use Core\App;
use Core\Validator;

$db = App::resolve(Database::class);
$currentUser = 2;

// find the note from the db
$note = $db->query(
    "select * from notes where id = :id ;",
    [':id' => $_POST['id']]
)->findOrFail();

// authorize the user
authorize($note['user_id'] === $currentUser);

// validate the updated note
$errors = [];

if (!Validator::string($_POST['body'], 1, 100)) {
    $errors['body'] = "A Note no less than 100 character is required.";
}

// update the note to the database
if (count($errors)) {
    return view('notes/edit.view.php', [
        'header' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}
$db->query('update notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);
// redirect the user to notes homepage
header('location: /notes');
die();
