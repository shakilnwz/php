<?php

use Core\Authenticator;

it('authenticates if the user is available or not', function () {
    $result = new Authenticator();
    $result->attempt('another@email.com', 'password');
    expect($result)->toBeTrue();
});
