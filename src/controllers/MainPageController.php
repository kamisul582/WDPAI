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
        
       $this->render_base();
        
    }
    public function render_base()
    {
        $userRepository = new UserRepository();
        $companiesRepository = new CompaniesRepository();
        $workTimeRepostiory = new WorkTimeRepository();

        $email = $_SESSION["email"];
        $user = $userRepository->getUser($email);
        $table = $workTimeRepostiory->getWorkTimeTable($user->getUser_id());
        $time = date("h:i:s a");
        $date = date('d M', strtotime(new DateTime('now')));
        $greeting = 'Hello '.$user->getName().' '.$user->getSurname().'!';
        $company_info = array_values($companiesRepository->getCompany($user->getEmployer_id())[0]);
        $workTimeRepostiory->insertTime($user->getUser_id(),$date,$time)
        return $this->render('main_page',['messages' => [$greeting],'company_name' => $company_info[0],'company_address' => $company_info[1],'table' => $table, 'time'=> $time, 'date'=> $date]);
    }
    
}