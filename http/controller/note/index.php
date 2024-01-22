<?php
    // dd($_SESSION);
    use Core\App;

    use Core\Database;
        

    $db = App::resolve(Database::class);
    $user = $db->query('select * from users where email = :email',[
        'email' => $_SESSION['user']['user']
    ])->find();
    $currentuser = $user['id'];


    $query = "select * from posts where  id = :id";
    $post = $db->query($query, [':id' => $_GET['id']])->findorabort();

    autherize($post['user_id'] === $currentuser);


    require view('note/index.view.php' , [
        'post' => $post
    ]);
