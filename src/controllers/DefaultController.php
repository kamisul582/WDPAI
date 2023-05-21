<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/WorkTimeRepository.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
    }
    //public function login()
    //{
    //    $this->render('login');
    //}
    public function main_page()
    {
        //$workTimeRepostiory = new WorkTimeRepository();
        //$table = $workTimeRepostiory->getWorkTimeTable($user_id);
        //$this->render('main_page',['table' => [$table]]);

    }
    public function kiosk_mode()
    {
        $this->render('kiosk_mode');
    }
}