<?php

namespace http\Form;

use Core\Validator;
use Core\ValidateException;

class Loginform{
    protected $errors = [];

    public function __construct(public array $attributes) {
        // dd($attributes['email']);
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = "Your email should be validate";
        }
        // dd(Validator::string($attribute['password'], 7, 15));
        if (!Validator::string($attributes['password'], 7, 15)) {
            // dd("error is here");
            $this->errors['password'] = "Your password is not enough to login account!!";
        }
        // dd($this->errors);
    }

    public static function validate($attributes){

        $instance = new static($attributes);

        $instance->failed() ? $instance->throw() : $instance;

    }

    public function failed(){
        return count($this->errors);
    }

    public function throw(){
       return  ValidateException::throw($this->errors(), $this->attributes);
    }

    public function errors(){
        return $this->errors;
    }

    public function error($field, $message){
        $this->errors[$field] = $message;

        return $this;
    }
}