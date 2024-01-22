<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$pwd = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = "Your email should be validate";
}

if (!Validator::string($pwd, 7, 15)) {
    $errors['password'] = "Your password is not enough to regsiter account!!";
}

if ($errors) {
    $_SESSION['_flashed']['error'] = $errors;
    redirect('/registerPage');
}
// dd('no error');
$db = App::resolve(Database::class);
// dd($db);
$user = $db->query('select * from users where email = :email',[
    'email' => $_POST['email']
])->find();

// dd($user);

if ($user) {
    // dd("user in database");
    header('location: /loginPage?error=your+email+is+already+registered');
    exit();
}else{
    // var_dump("user not in database");
    $db->query('INSERT INTO users (email, password) value(:email, :password)',[
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
    ]);
    // dd($email);
    login($email);
    // dd($_SESSION['user']);

    header('location: /');
    exit();
}


