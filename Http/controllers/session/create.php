<?php

use Core\Session;

view(
    'session/create.view.php',
    //pass the errors from the session
    [
        'errors' => Session::get('errors') ?? []
    ]
);
