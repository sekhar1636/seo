<?php
/*GLOBAL DEFINITIONS*/
define('DEVELOPMENT_MODE', true);

/*Show PHP Errors*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);	

/*Define DB CREDENTIALS*/
define('DB_HOST', 'localhost');
define('DB_NAME', 'strawh5_strawhat2015');
define('DB_USER', 'strawh5_new');
define('DB_PASS', 'J7c25s57Wombat');

/*Define BASE URL & PATH*/
define('BASE_URL', 'http://strawhat-auditions.com');
define('BASE_PATH', '/home/strawh5/public_html');

/*Define APP URL & PATH*/
define('APP_ROOT', '/marcoApp/');
define('APP_URL', BASE_URL . APP_ROOT);
define('APP_PATH', BASE_PATH . APP_ROOT);

/*Define APP Path*/
define('APP_DIR_PATH', APP_PATH . 'app/');
define('VIEWS_DIR_PATH', APP_DIR_PATH . 'Views/');

/*Define APPLICATION URLS*/
define('ASSETS', APP_URL . 'assets/');
define('ACTOR_IMAGE_PATH', '/Members11/Actors/ActorPix/');
define('ACTOR_RESUME_PATH', '/Members11/Actors/ActorRes/');
