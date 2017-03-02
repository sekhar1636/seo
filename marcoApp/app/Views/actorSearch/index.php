<?php
/*LOAD CONTROLLERS*/
$ActorController = new \App\Controller\ActorController;
?>

<?php include VIEWS_PATH . 'actorSearch/_layouts/main.header.php';?>

<div class="controls">
    <button type="button" class="control" data-sort="age:desc name:asc">Desc</button>
    <button type="button" class="control" data-sort="age:asc name:asc">Asc</button>
    
    <button type="button" class="control" data-filter="all">All</button>
    <button type="button" class="control" data-filter=".M">Male</button>
    <button type="button" class="control" data-filter=".F">Female</button>
</div>

<div class="container">
    <?php echo $ActorController->actorList();?>
    <div class="gap"></div>
    <div class="gap"></div>
    <div class="gap"></div>
</div>

<?php include VIEWS_PATH . 'actorSearch/_layouts/main.footer.php';?>