<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);



$notes = $db->query("select * from notes where user_id = 2 ;")->get();

view('notes/index.view.php', [
    'header' => 'My Notes',
    'notes' => $notes
]);
