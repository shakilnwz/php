<?php
//requiring the functions at the top of the page

$header = "Note";

$config = require "config.php";
$db = new Database($config['Database'], "root", "AHsy@9186");


$note = $db->query("select * from notes where id = :id ;", [':id' => $_GET['id']])->findOrFail();

$currentUser = 2;

authorize($note['user_id'] === $currentUser);

require "views/notes/show.view.php";
