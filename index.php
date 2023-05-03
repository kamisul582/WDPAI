<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('kiosk_mode', 'DefaultController');
Router::get('main_page', 'DefaultController');
Router::post('login', 'SecurityController');
Router::run($path);