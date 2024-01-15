<?php
//requiring the functions at the top of the page

$header = "My Notes";

$config = require "config.php";
$db = new Database($config['Database'], "root", "AHsy@9186");


$notes = $db->query("select * from notes where user_id = 2 ;")->get();

require "views/notes.view.php";
