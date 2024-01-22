<?php 
// dd("Hello this is store");

use Core\App;
use Core\Database;
use Core\Validator;

// dd(base_path('Validator.php'));
require base_path('Core/Validator.php');
$db = App::resolve(Database::class);
// dd($db);
$error = [];

if ($_SERVER['REQUEST_METHOD'] === "POST" ) {
    $input = htmlspecialchars(trim($_POST['title']));
    
    $error = '';
    if (!Validator::string($input, 4, 10)) {
        $error = "your input character is not enough to submite tables!!";
    }


    if (empty($error)) {

        $user = $db->query('select * from users where email = :email',[
            'email' => $_SESSION['user']['user']
        ])->find();

        $db->query('INSERT INTO posts (title, user_id) VALUES (:title , :user_id)',
        [
            'title' => $_POST['title'],
            'user_id' => $user['id']
        ]);
    }
}else{
    $error='';
}

require  view('note/create.view.php',[
    'error' => $error
]);