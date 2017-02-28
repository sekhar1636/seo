<?php
/*AUTOLOAD*/
require __DIR__ . '/vendor/autoload.php';

/*UTILITIES - GetCurrentURL*/
$RouteController = new \App\Controller\RouteController;

/*DEFINE - Route Information*/
$getCurrentUrl = $RouteController->getCurrentUrl(TRUE, TRUE);
$getRoute = $RouteController->defineRoute(BASE_HOME, $getCurrentUrl);

/*SET - Routes*/
switch($getRoute['name']){
	case 'actorSearch':
		require(VIEWS_PATH . 'actorSearchw/index.php');
		break;
	default:
		echo 'You should not be here';
}