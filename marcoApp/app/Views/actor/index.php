<?php
/*LOAD CONTROLLERS*/
$ActorController = new \App\Controller\ActorController;
?>

<?php include VIEWS_DIR_PATH . 'actor/_layouts/main.header.php';?>


<?php print_r($ActorController->single());?>

<?php include VIEWS_DIR_PATH . 'actor/_layouts/main.footer.php';?>