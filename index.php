<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('login', 'DefaultController');
Router::get('kiosk_mode', 'DefaultController');

Router::run($path);