<?php


$uri = parse_url($_SERVER["REQUEST_URI"])['path'];


$routes = [
  '/' => 'controllers/index.php',
  '/about' => 'controllers/about.php',
  '/contact' => 'controllers/contact.php'
];

if (array_key_exists($uri, $routes)) {
  require $routes[$uri];
}
