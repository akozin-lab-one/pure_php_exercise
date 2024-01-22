<?php

use Core\Authenticator;
use http\Form\Loginform;



$form = Loginform::validate($attribute = [
    'email'=>$_POST['email'],'password'=>$_POST['password']
]);

$singIn = (new Authenticator)->attempt(
    $attribute['email'],$attribute['password']
    );

if (!$singIn) 
{
    $form->error(
        'email', "your email and password did not match!"
        )->throw();
}

redirect('/');








