<?php
/*LOAD CONTROLLERS*/
$ActorController = new \App\Controller\ActorController;
?>

<?php include VIEWS_DIR_PATH . 'actorSearch/_layouts/main.header.php';?>

<form class="controls">
    <button type="reset" class="control control-text">Reset</button>
    
    <fieldset data-filter-group="gender" class="control-group">
        <label class="control-group-label control-text">Gender</label>
	    <button type="button" class="control control-gender control-text" data-filter="all">All</button>
	    <button type="button" class="control control-gender control-text" data-filter=".M">Male</button>
	    <button type="button" class="control control-gender control-text" data-filter=".F">Female</button>
    </fieldset>
    
    <!--
	    Not working
    <fieldset data-filter-group="" class="text-input-wrapper">
        <input type="text" data-search-attribute="data-first-name" placeholder="Search by First Name"/>
    </fieldset>

    <fieldset data-filter-group="" class="text-input-wrapper">
        <input type="text" data-search-attribute="data-last-name" placeholder="Search by Last Name"/>
    </fieldset>
    -->
    
    <fieldset data-filter-group="age" class="control-group">
        <label class="control-group-label control-text">Age</label>
	    <button type="button" class="control control-sort" data-sort="age:desc">Desc</button>
	    <button type="button" class="control control-sort" data-sort="age:asc">Asc</button>
    </fieldset> 
    
    <fieldset data-filter-group="height" class="control-group">
        <label class="control-group-label control-text">Height</label>
	    <button type="button" class="control control-sort" data-sort="height:desc">Desc</button>
	    <button type="button" class="control control-sort" data-sort="height:asc">Asc</button>
    </fieldset>
    
	<fieldset data-filter-group="apprentice" class="control-group">
	    <label class="control-group-label control-text">Apprentice</label>
	    <button type="button" class="control control-size" data-toggle="[data-apprentice=Y]">Enable</button>
	</fieldset>

	<fieldset data-filter-group="intern" class="control-group">
	    <label class="control-group-label control-text">Intern</label>
	    <button type="button" class="control control-size" data-toggle="[data-intern=Y]">Enable</button>
	</fieldset>
	
	<fieldset data-filter-group="standby" class="control-group">
	    <label class="control-group-label control-text">Standby</label>
	    <button type="button" class="control control-size" data-toggle="[data-standby=Y]">Enable</button>
	</fieldset>
    
</form>

<div class="container">
    <?php echo $ActorController->actorList();?>
	<div class="gap"></div>
	<div class="gap"></div>
	<div class="gap"></div>
	<div class="gap"></div>
</div>

<div class="controls-pagination">
    <div class="mixitup-page-list"></div>
    <div class="mixitup-page-stats"></div>
</div>

<?php include VIEWS_DIR_PATH . 'actorSearch/_layouts/main.footer.php';?>