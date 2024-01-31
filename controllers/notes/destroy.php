<?php

use Core\Database;


$config = require base_path("config.php");
$db = new Database($config['Database'], "root", "AHsy@9186");

$currentUser = 2;

$note = $db->query(
    "select * from notes where id = :id ;",
    [':id' => $_POST['id']]
)->findOrFail();

authorize($note['user_id'] === $currentUser);

$db->query(
    "delete from notes where id = :id ;",
    [':id' => $_POST['id']]
);

header('location: /notes');
exit();
