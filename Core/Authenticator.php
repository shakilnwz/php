<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        //query the database for a match 
        $user = App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        // check if the user is found or not
        if ($user) {
            // verify if the user is available
            if (password_verify($password, $user['password'])) {
                // login the user
                $this->login([
                    'email' => $email
                ]);
                return true;
            }
        }
        return false;
    }

    public function login($user)
    {
        return $_SESSION['user'] = [
            'email' => $user['email']
        ];
        // regenrate the session id
        session_regenerate_id(true);
    }

    public function logout()
    {
        // destroy the session.
        Session::destroy();
    }
}
