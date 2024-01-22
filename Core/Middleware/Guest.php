<?php

namespace Core\Middleware;

class Guest{
    public function handle(){
        // dd($_SESSION['user']);
        if ($_SESSION['user'] ?? false) {
            header('location: /registerPage');
            exit();
        }
        
        
    }
}