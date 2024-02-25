<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    // bring errors outside and make protected
    protected $errors = [];
    public function __construct(public array $attributes)
    {
        // check for validation
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }
        if (!Validator::string($attributes['password'])) {
            $this->errors['password'] = 'Please provide a valid password';
        }
    }
    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw():$instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }
    //check if failed validation
    public function failed()
    {
        return count($this->errors);
    }

    //create getter for errors
    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
        return $this;
    }
}
