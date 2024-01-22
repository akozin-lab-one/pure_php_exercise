<?php


$router->get('/','index.php');
$router->get('/about','about.php');
$router->get('/contact','contact.php');
$router->get('/note','note/index.php')->only('auth');
$router->get('/edit/note','note/edit.php')->only('auth');
$router->patch('/note','note/update.php')->only('auth');
$router->delete('/note','note/Destory.php')->only('auth');
$router->get('/notes','note/notes.php')->only('auth');
$router->get('/notes/create-notes','note/create.php')->only('auth');
$router->post('/notes/create-notes','note/store.php')->only('auth');

$router->get('/loginPage', 'note/login.php')->only('guest');
$router->post('/login', 'note/loginStore.php');

$router->delete('/logout', 'note/Logout.php');

$router->get('/registerPage', 'note/register.php')->only('guest');
$router->post('/register', 'note/registerStore.php');
