<?php

require_once 'AppController.php';
require_once 'SecurityController.php';
#require_once __DIR__.'/../repository/UserRepository.php';

class MainPageController extends AppController {
    public function punch_in()
    {  
        session_start();
        if (!$this->isPost()) {
            return $this->render('main_page');
        }
        if (!$_SESSION["loggedIn"]) {
            return $this->render('login', ['messages' => ['You need to be logged in!']]);
            die;
        }
        $workTimeRepostiory = new WorkTimeRepository();
        $userRepository = new UserRepository();
        $companiesRepository = new CompaniesRepository();
        $email = $_SESSION["email"];
        
        $user = $userRepository->getUser($email);
        date_default_timezone_set('Europe/Warsaw');
        $time = date("h:i:s a");
        $date = date('d M');
        
        $workTimeRepostiory->insertTime($user->getUser_id(),date('d M'),date("h:i:s a"),$workTimeRepostiory);
       
        
       $this->render_base($workTimeRepostiory, $userRepository, $companiesRepository);
        
    }
    public function render_base($workTimeRepostiory, $userRepository, $companiesRepository)
    {
        $email = $_SESSION["email"];
        $user = $userRepository->getUser($email);
        $table = $workTimeRepostiory->getWorkTimeTable($user->getUser_id());
        $punched_in = $workTimeRepostiory->check_if_punched_in($user->getUser_id());
        $greeting = 'Hello '.$user->getName().' '.$user->getSurname().'!';
        $company_info = array_values($companiesRepository->getCompany($user->getEmployer_id())[0]);
        return $this->render('main_page',['messages' => [$greeting],'company_name' => $company_info[0],'company_address' => $company_info[1],'table' => $table, 'punched_in' => $punched_in]);
    }
    
}