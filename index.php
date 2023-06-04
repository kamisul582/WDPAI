<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('kiosk_mode', 'DefaultController');
Router::get('main_page', 'DefaultController');
Router::get('register_page', 'DefaultController');
Router::post('login_user', 'SecurityController');
Router::post('log_out', 'SecurityController');
Router::post('login_user_company', 'SecurityController');
Router::post('login_trigger', 'SecurityController');
Router::post('register_user', 'SecurityController');
Router::post('register_company', 'SecurityController');
Router::post('enter_time', 'MainPageController');
Router::post('enter_kiosk_code', 'MainPageController');
Router::run($path);