<?php

require_once 'AppController.php';
require_once 'MainPageController.php';
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
        session_start();
        $_SESSION["loggedIn"] = true;
        $_SESSION["email"] = $email;
        $workTimeRepostiory = new WorkTimeRepository();
        $table = $workTimeRepostiory->getWorkTimeTable($user->getUser_id());
        $greeting = 'Hello '.$user->getName().' '.$user->getSurname().'!';
        $companiesRepository = new CompaniesRepository();
        $company_info = array_values($companiesRepository->getCompany($user->getEmployer_id())[0]);
        $values = (array_values($company_info));
        $mainPageController = new MainPageController();
        $mainPageController -> render_base($workTimeRepostiory, $userRepository, $companiesRepository);   
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $employer_id = $_POST['employer_id'];

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }
        $userRepository = new UserRepository();
        //TODO try to use better hash function
        $tmp_id = 17; //real id will be set by DB autoincrement
        $user = new User($tmp_id,$email, md5($password), $name, $surname, $employer_id);
        var_dump($user);

        $userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}