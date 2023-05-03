<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
class SecurityController extends AppController
{
    public function login()
    {
        $user = new User('a', 'a','Jan', 'Kowalski');
        
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }
        
        return $this->render('main_page',['messages' => ['Hello '.$user->getName().' '.$user->getSurname().'!']]);

        //return $this->render('main_page',['messages' => ["John Smith"]]);

        //$url = "http://$_SERVER[HTTP_HOST]";
        //header("Location: {$url}/main_page");
        //var_dump($_POST);
        
    }
}