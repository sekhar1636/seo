<?php
/*AUTOLOAD*/
require __DIR__ . '/vendor/autoload.php';

/*TEST CONTROLLERS*/
$ActorController = new \App\Controller\ActorController;

print_r($ActorController->single());