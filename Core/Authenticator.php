<?php 

namespace Core;
use Core\App;
use Core\Database;

class Authenticator{

    protected $errors = [];

    public function attempt($email, $pwd){
        $user = (App::resolve(Database::class))->query('select * from users where email = :email',[
            'email' => $email
        ])->find();


        if($user){
            if (!password_verify($pwd, $user['password'])) {
                return true;
            }

            $this->login($email);

        }

        return false;
    }

    public function login($email){
        // dd($email);
        $_SESSION['user'] = [
            'user' => $email
        ];
    
        session_regenerate_id(true);
    }

    public function errors(){
        return $this->errors;
    }

    public function error($field, $message){
        $this->errors[$field] = $message;
    }

}