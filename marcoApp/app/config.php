<?php
/*GLOBAL DEFINITIONS*/
define('DEVELOPMENT_MODE', true);

/*Show PHP Errors*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);	

/*Define BASE*/
define('BASE_HOME', '/marcoApp/');
define('BASE_URL', 'http://strawhat-auditions.com' . BASE_HOME);
define('BASE_PATH', '/home/strawh5/public_html' . BASE_HOME);

/*Define DB*/
define('DB_HOST', 'localhost');
define('DB_NAME', 'strawh5_strawhat2015');
define('DB_USER', 'strawh5_new');
define('DB_PASS', 'J7c25s57Wombat');

/*Define APP & Assets Path*/
define('ASSETS', BASE_URL . 'assets/');
define('APP_PATH', BASE_PATH . 'app/');
define('VIEWS_PATH', APP_PATH . 'Views/');