<?php

use Core\App;
use Core\Database;
use Core\Validator;


$db = App::resolve(Database::class);
$user = $db->query('select * from users where email = :email',[
    'email' => $_SESSION['user']['user']
])->find();
$currentuser = $user['id'];

$query = "select * from posts where  id = :id";
$post = $db->query($query, [':id' => $_POST['id']])->find();
// dd($post);
autherize($post['user_id'] === $currentuser);

$input = htmlspecialchars(trim($_POST['title']));
// var_dump($input);
$error = [];
// dd(!Validator::string($input, 0, 15));        
if (!Validator::string($input, 0, 15)) {
    $error = "your input character is not enough to submite tables!!";
}
// dd($error);
// dd(!empty($error));
if (!empty($error)) {
    // dd(view('note/edit.view.php'));
    require  view('note/edit.view.php',[
        'error' => $error
    ]);
}else{
    $result = $db->query("update posts set title = :title where id = :id", [
        'id' => $_POST['id'],
        'title' => $_POST['title']
    ]);
    // dd($result);
    
    header('location: /notes');
    exit();
    
}
// dd($error);
// dd($_POST['title']);



