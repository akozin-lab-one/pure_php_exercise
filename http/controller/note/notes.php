<?php

// $_SESSION['name'] = "Ko Aung";

use Core\App;
use Core\Database;
        

$db = App::resolve(Database::class);
$user = $db->query('select * from users where email = :email',[
    'email' => $_SESSION['user']['user']
])->find();

$query = "select id,title,user_id from posts where user_id = :user_id";
$posts = $db->query($query,[
    'user_id' => $user['id']
])->get();
// dd($posts);
require view('note/notes.view.php',[
    'posts' => $posts
]);