<?php

namespace Core\Middleware;

class Auth
{
    public function handle()
    {
        // check if user is logged in or not
        if (!$_SESSION['user'] ?? false) {
            header('location: /');
            exit();
        }
    }
}
