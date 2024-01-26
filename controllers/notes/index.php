<?php

// requiring the functions at the top of the page

$config = require base_path("config.php");
$db = new Database($config['Database'], "root", "AHsy@9186");


$notes = $db->query("select * from notes where user_id = 2 ;")->get();

view('notes/index.view.php', [
    'header' => 'My Notes',
    'notes' => $notes
]);
