<?php

//setting a session data
$_SESSION['name'] = 'Shakil';

//requiring the functions at the top of the page
view('index.view.php', [
    'header' => 'Home'
]);
