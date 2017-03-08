<?php
/*LOAD CONTROLLERS*/
$ActorController = new \App\Controller\ActorController;
?>

<?php include VIEWS_DIR_PATH . 'actorSearch/_layouts/main.header.php';?>

<div class="container-fluid">
	<div class="col-md-4">
		<form class="controls">

		    <fieldset data-filter-group="gender" class="control-group">
		        <label class="control-group-label control-text">Gender</label>
			    <button type="button" class="control control-gender control-text" data-filter="all">All</button>
			    <button type="button" class="control control-gender control-text" data-filter=".M">Male</button>
			    <button type="button" class="control control-gender control-text" data-filter=".F">Female</button>
		    </fieldset><br/>
		    
		   
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
		    </fieldset><br/>
		    
		    <fieldset data-filter-group="height" class="control-group">
		        <label class="control-group-label control-text">Height</label>
			    <button type="button" class="control control-sort" data-sort="height:desc">Desc</button>
			    <button type="button" class="control control-sort" data-sort="height:asc">Asc</button>
		    </fieldset><br/>
		    
			<fieldset data-filter-group="apprentice" class="control-group">
			    <label class="control-group-label control-text">Apprentice</label>
			    <button type="button" class="control control-size" data-toggle="[data-apprentice=Y]">Enable</button>
			</fieldset><br/>
		
			<fieldset data-filter-group="intern" class="control-group">
			    <label class="control-group-label control-text">Intern</label>
			    <button type="button" class="control control-size" data-toggle="[data-intern=Y]">Enable</button>
			</fieldset><br/>
			
		    <button type="reset" class="btn btn-warning">Reset</button><br/>
		    
		</form>
	</div>
	<div class="col-md-8">
		<div class="actorContainer">
		    <?php echo $ActorController->actorList();?>
			<div class="gap"></div>
			<div class="gap"></div>
			<div class="gap"></div>
			<div class="gap"></div>
			<div class="gap"></div>
			<div class="gap"></div>
		</div>
		
		<div class="controls-pagination">
		    <div class="mixitup-page-list"></div>
		    <div class="mixitup-page-stats"></div>
		</div>
	</div>
</div>

<?php include VIEWS_DIR_PATH . 'actorSearch/_layouts/main.footer.php';?>