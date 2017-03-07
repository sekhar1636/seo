<?php
/*AUTOLOAD*/
require __DIR__ . '/vendor/autoload.php';

/*Current Query*/
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);

/*SET - Routes*/
switch($page){
	case 'actorSearch':
		require(VIEWS_DIR_PATH . 'actorSearch/index.php');
		break;
	default:
		echo 'You should not be here';
}