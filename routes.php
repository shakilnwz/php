<?php
$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php');
$router->delete('/note', 'notes/destroy.php');

$router->get('/notes/create', 'notes/create.php');
$router->post('/notes', 'notes/store.php');

// editing note
$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note', 'notes/update.php');

// add new user
$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php');

//login routes
$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');
