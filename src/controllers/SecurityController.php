<?php

require_once 'AppController.php';
require_once 'MainPageController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/WorkTimeRepository.php';
require_once __DIR__.'/../repository/CompaniesRepository.php';
class SecurityController extends AppController
{   
    public function login_trigger(){
        
        if (!$this->isPost()) {
            return $this->render('login');
        }
        $login_as_company = $_POST['login_as_company'];
        if ($login_as_company == "on")
            $this->login_company();
        else
            $this->login_user();
    }
    public function login_company()
    {
        $companiesRepository = new CompaniesRepository();
        
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        
        $company = $companiesRepository->getCompany($email);
        if (!$company) {
            return $this->render('login', ['messages' => ['Company not found!']]);
        }
        if ($company->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['Company with this email does not exist!'.$user->getEmail()]]);
        }

        if ($company->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }
        session_start();
        $_SESSION["loggedIn"] = true;
        $_SESSION["email"] = $email;
        //$userRepository->setKioskCode($user->getUser_id());
        //$workTimeRepostiory = new WorkTimeRepository();
        //$table = $workTimeRepostiory->getWorkTimeTable($user->getUser_id());
        //$greeting = 'Hello '.$user->getName().' '.$user->getSurname().'!';
        $companiesRepository = new CompaniesRepository();
        //$company_info = array_values($companiesRepository->getCompany($user->getEmployer_id())[0]);
        //$values = (array_values($company_info));
        $mainPageController = new MainPageController();
        $mainPageController -> render_company_base($email,$companiesRepository);   
    }
    public function log_out(){
        session_start();
        setcookie(session_name(), '', 100);
        session_unset();
        session_destroy();
        $_SESSION = array();
        return $this->render('login');
    }
    public function login_user()
    {
        $userRepository = new UserRepository();
        
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        
        $user = $userRepository->getUser($email);
        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }
        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email does not exist!'.$user->getEmail()]]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }
        session_start();
        $_SESSION["loggedIn"] = true;
        $_SESSION["email"] = $email;
        if ($user->getKiosk_code()==NULL){
            $userRepository->setKioskCode($user->getUser_id());
            var_dump($user);
        }
        $workTimeRepostiory = new WorkTimeRepository();
        //$table = $workTimeRepostiory->getWorkTimeTable($user->getUser_id());
        //$greeting = 'Hello '.$user->getName().' '.$user->getSurname().'!';
        $companiesRepository = new CompaniesRepository();
        //$company_info = array_values($companiesRepository->getCompany($user->getEmployer_id())[0]);
        //$values = (array_values($company_info));
        $mainPageController = new MainPageController();
        $mainPageController -> render_base($workTimeRepostiory, $userRepository, $companiesRepository);   
    }

    public function register_user()
    {
        if (!$this->isPost()) {
            return $this->render('register_user');
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
        $user = new User(1,$email, sha1($password), $name, $surname, $employer_id,"abcd");
        var_dump($user);

        $userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
    public function register_company()
    {
        if (!$this->isPost()) {
            return $this->render('register_company');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $company_name = $_POST['company_name'];
        $company_address = $_POST['company_address'];

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }
        $companiesRepository = new CompaniesRepository();
        //TODO try to use better hash function
        $company = new Company(1,$email, sha1($password), $company_name, $company_address, );
        var_dump($company);

        $companiesRepository->addCompany($company);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}