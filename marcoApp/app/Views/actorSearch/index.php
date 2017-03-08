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

		    <fieldset data-filter-group="audition-type" class="control-group">
		        <label class="control-group-label control-text">Audition Type</label>
			    <button type="button" class="control control-text" data-filter="[data-audition-type=Y]">Monologue Only</button>
			    <button type="button" class="control control-text" data-filter="[data-audition-type=N]">Song & Monologue</button>
			    <button type="button" class="control control-text" data-filter="[data-audition-type=D]">Dancer Who Sings</button>
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

			<fieldset data-filter-group="ethnicity" class="control-group">
			    <label class="control-group-label control-text">Ethnicity</label>
			    <button type="button" class="control" data-filter="all">All</button>
			    <label class="control-group-label control-text">Native American</label>
			    <button type="button" class="control" data-toggle=".Na">Native American<</button>
			    <label class="control-group-label control-text">Asian</label>
			    <button type="button" class="control control-size" data-toggle=".As">Enable</button>
			    <label class="control-group-label control-text">White/Caucasian</label>
			    <button type="button" class="control control-size" data-toggle=".Ca">Enable</button>
			    <label class="control-group-label control-text">Black/African American</label>
			    <button type="button" class="control control-size" data-toggle=".Af">Enable</button>
			    <label class="control-group-label control-text">Hispanic</label>
			    <button type="button" class="control control-size" data-toggle=".Hi">Enable</button>
			    <label class="control-group-label control-text">European</label>
			    <button type="button" class="control control-size" data-toggle=".Ea">Enable</button>
			    <label class="control-group-label control-text">Middle Eastern</label>
			    <button type="button" class="control control-size" data-toggle=".Mi">Enable</button>
			    <label class="control-group-label control-text">Indian</label>
			    <button type="button" class="control control-size" data-toggle=".In">Enable</button>
			</fieldset><br/>

<!--
			<fieldset data-filter-group="ethnicity" cclass="checkbox-group">
                <label class="checkbox-group-label">Ethnicity</label>
                <div class="checkbox">
				    <label class="checkbox-label">Native American</label>
				    <input type="checkbox" value=".Na"/>
                </div>
                <div class="checkbox"/>
				    <label class="checkbox-label">Asian</label>
				    <input type="checkbox" value=".As"/>
                </div>
                <div class="checkbox"/>
				    <label class="checkbox-label"/>White/Caucasion</label>
				    <input type="checkbox" value=".Ca"/>
                </div>
                <div class="checkbox"/>
				    <label class="checkbox-label"/>Black/African American</label>
				    <input type="checkbox" value=".Af"/>
                </div>
                <div class="checkbox"/>
				    <label class="checkbox-label"/>Hispanic</label>
				    <input type="checkbox" value=".Hi"/>
                </div>
                <div class="checkbox"/>
				    <label class="checkbox-label"/>European</label>
				    <input type="checkbox" value=".Ea"/>
                </div>
                <div class="checkbox"/>
				    <label class="checkbox-label"/>Middle Eastern</label>
				    <input type="checkbox" value=".Mi"/>
                </div>
                <div class="checkbox"/>
				    <label class="checkbox-label">Indian</label>
				    <input type="checkbox" value=".In"/>
                </div>
			</fieldset><br/>
-->	
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