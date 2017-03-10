<?php
/*LOAD CONTROLLERS*/
$ActorController = new \App\Controller\ActorController;
?>

<?php include VIEWS_DIR_PATH . 'actorSearch/_layouts/main.header.php';?>

<div class="container-fluid">
	<div class="col-md-4">
		<form class="controls">

		    <div class="filter-group" style="margin-bottom:10px;">
			    <span class="filter-group-label">Actor Details</span>  
			    <fieldset data-filter-group="gender" class="control-group">
			        <label class="control-group-label control-text">Gender</label>
			        
				    <button type="button" class="control control-gender control-text" data-filter="all">All</button>
				    <button type="button" class="control control-gender control-text" data-filter=".M">Male</button>
				    <button type="button" class="control control-gender control-text" data-filter=".F">Female</button>
			    </fieldset><br/> 
			    
				<fieldset data-filter-group="height-group" class="control-group">
				    <label class="control-group-label control-text">Height</label>
	                <select>
	                    <option value="">--Height--</option>
	                    <option value="[data-height-group=under5]">Under 5ft</option>
	                    <option value="[data-height-group=bet5and56]">Between 5ft & 5ft 6inch</option>
	                    <option value="[data-height-group=bet56and6]">Between 5ft 6inch & 6ft</option>
	                    <option value="[data-height-group=bet6and66]">Between 6ft & 6ft 6inch</option>
	                    <option value="[data-height-group=over66]">Over 6ft 6inch</option>
	                </select>
	            </fieldset><br/>
	
			    <fieldset data-filter-group="audition-type" class="control-group">
				    <label class="control-group-label control-text">Audition Type</label>
	                <select>
	                    <option value="">--Audition Type--</option>
	                    <option value="[data-audition-type=Y]">Monologue Only</option>
	                    <option value="[data-audition-type=N]">Song & Monologue</option>
	                    <option value="[data-audition-type=D]">Dancer Who Sings</option>
	                </select>
			    </fieldset><br/>

				<fieldset data-filter-group="skills-vocal" class="control-group">
				    <label class="control-group-label control-text">Vocal Range</label>
	                <select>
	                    <option value="">--Vocal Range--</option>
	                    <option value="[data-skill-vocal=S]">Soprano</option>
	                    <option value="[data-skill-vocal=MS]">Mezzo</option>
	                    <option value="[data-skill-vocal=A]">Alto</option>
	                    <option value="[data-skill-vocal=T]">Tenor</option>
	                    <option value="[data-skill-vocal=B]">Baritone</option>
	                </select>
	            </fieldset><br/>
	
			    <!--<fieldset data-filter-group="height" class="control-group">
			        <label class="control-group-label control-text">Height</label>
				    <button type="button" class="control control-sort" data-sort="height:desc">Desc</button>
				    <button type="button" class="control control-sort" data-sort="height:asc">Asc</button>
			    </fieldset><br/>-->
		    </div>
		    
		    <div class="filter-group" style="margin-bottom:10px;">
			    <span class="filter-group-label">Will Consider</span>
			    
				<fieldset data-filter-group="apprentice">
	                <div class="checkbox checkbox-inner">
	                    <label class="checkbox-label">Apprentice</label>
	                    <input type="checkbox" value="[data-apprentice=Y]"/>
	                </div>
				</fieldset><br/>
			
				<fieldset data-filter-group="intern">
	                <div class="checkbox checkbox-inner">
	                    <label class="checkbox-label">Intern</label>
	                    <input type="checkbox" value="[data-intern=Y]"/>
	                </div>
				</fieldset><br/>
	
				<fieldset data-filter-group="availability">
	                <div class="checkbox checkbox-inner">
	                    <label class="checkbox-label">Employment Availability</label>
	                    <input type="checkbox" value="[data-availability=Y]"/>
	                </div>
				</fieldset><br/>
		    </div><br/>

			<fieldset data-filter-group="ethnicity" class="checkbox-group" data-logic="and">
				<label class="checkbox-group-label">Ethnicity</label>
				
                <div class="checkbox">
                    <label class="checkbox-label">Native American</label>
                    <input type="checkbox" value=".Na"/>
                </div>
                <div class="checkbox">
                    <label class="checkbox-label">Asian</label>
                    <input type="checkbox" value=".As"/>
                </div>
                <div class="checkbox">
                    <label class="checkbox-label">White/Caucasian</label>
                    <input type="checkbox" value=".Ca"/>
                </div>
                <div class="checkbox">
                    <label class="checkbox-label">Black/African American</label>
                    <input type="checkbox" value=".Af"/>
                </div>
                <div class="checkbox">
                    <label class="checkbox-label">Hispanic</label>
                    <input type="checkbox" value=".Hi"/>
                </div>			    
                <div class="checkbox">
                    <label class="checkbox-label">European</label>
                    <input type="checkbox" value=".Ea"/>
                </div>	
                <div class="checkbox">
                    <label class="checkbox-label">Middle Eastern</label>
                    <input type="checkbox" value=".Mi"/>
                </div>	
                <div class="checkbox">
                    <label class="checkbox-label">Indian</label>
                    <input type="checkbox" value=".In"/>
                </div>
			</fieldset>
			
			<fieldset data-filter-group="skills" class="checkbox-group" data-logic="and">
				<label class="checkbox-group-label">Skills</label>
				<?php
				$skills = ["ballet","ballroom","tap","swing","jazz","perc","sax","banjo","piano","drums","cello","clarinet","trombone","trumpet","flute","violin","guitar"];
				
				foreach($skills as $skill){
	                echo '<div class="checkbox">';
	                    echo '<label class="checkbox-label">' . ucfirst($skill) . '</label>';
	                    echo '<input type="checkbox" value=".' . $skill . '"/>';
	                echo '</div>';
				}
				?>
			</fieldset>

		    <button type="reset" class="btn btn-warning btn-block">Reset Filters</button>
		    
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