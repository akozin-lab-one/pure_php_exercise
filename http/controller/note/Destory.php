<?php

use Core\App;

use Core\Database;
        

    $db = App::resolve(Database::class);
    
    $user = $db->query('select * from users where email = :email',[
        'email' => $_SESSION['user']['user']
    ])->find();
    $currentuser = $user['id'];
    
    $result = $db->query('delete from posts where id = :id', [':id' => $_POST['id']]);

    header('location: /notes');
    exit();
