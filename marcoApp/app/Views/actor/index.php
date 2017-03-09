<?php
/*LOAD CONTROLLERS*/
$ActorController = new \App\Controller\ActorController;

/*Define Current Actor*/
$actor = $ActorController->single();
?>
<?php include VIEWS_DIR_PATH . 'actor/_layouts/main.header.php';?>

<div class="container-fluid">
	<div class="main <?php echo $actor['physical']['gender'];?>">

		<?php print_r($actor);?>
	</div>
</div>

<?php include VIEWS_DIR_PATH . 'actor/_layouts/main.footer.php';?>