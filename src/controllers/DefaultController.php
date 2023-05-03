<?php

require_once 'AppController.php';

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
        $this->render('main_page');
    }
    public function kiosk_mode()
    {
        $this->render('kiosk_mode');
    }
}