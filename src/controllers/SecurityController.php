<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/WorkTimeRepository.php';
require_once __DIR__.'/../repository/CompaniesRepository.php';
class SecurityController extends AppController
{
    public function login()
    {
        $userRepository = new UserRepository();
        
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);
        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }
        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!'.$user->getEmail()]]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }
        #var_dump($user);
        session_start();
        $_SESSION["loggedIn"] = true;
        $_SESSION["email"] = $email;
        $workTimeRepostiory = new WorkTimeRepository();
        $table = $workTimeRepostiory->getWorkTimeTable($user->getUser_id());
        #var_dump($table);
        $greeting = 'Hello '.$user->getName().' '.$user->getSurname().'!';
        $companiesRepository = new CompaniesRepository();
        $company_info = array_values($companiesRepository->getCompany($user->getEmployer_id())[0]);
        #var_dump($company_info);
        $values = (array_values($company_info));
        #$this->render('main_page',['table' => [$table]]);
        return $this->render('main_page',['messages' => [$greeting],'company_name' => $company_info[0],'company_address' => $company_info[1],'table' => $table]);
        #return $this->render('main_page',['table' => $table]);
        //return $this->render('main_page',['messages' => ["John Smith"]]);

        //$url = "http://$_SERVER[HTTP_HOST]";
        //header("Location: {$url}/main_page");
        //var_dump($_POST);
        
    }
}