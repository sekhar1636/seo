<?php
$ActorController = new \App\Controller\ActorController;
$ActorProcess = new \App\Process\ActorProcess;
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
	            <fieldset data-filter-group="first-name" class="text-input-wrapper">
				    <label class="control-group-label control-text">First Name</label>
	                <input type="text" data-search-attribute="data-first-name" placeholder="Type first name here"/>
	            </fieldset><br/>
	            <fieldset data-filter-group="last-name" class="text-input-wrapper">
				    <label class="control-group-label control-text">Last Name</label>
	                <input type="text" data-search-attribute="data-last-name" placeholder="Type last name here"/>
	            </fieldset>
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
				</fieldset>
		    </div><br/>

			<fieldset data-filter-group="ethnicity" class="checkbox-group" data-logic="and">
				<label class="checkbox-group-label">Ethnicity</label>
				<?php
				$ethnicities = ["Na","As","Ca","Af","Hi","Ea","Mi","In"];	
				foreach($ethnicities as $race){
	                echo '<div class="checkbox">';
	                    echo '<label class="checkbox-label">' . $ActorProcess->processEthnicity($race) . '</label>';
	                    echo '<input type="checkbox" value=".' . $race . '"/>';
	                echo '</div>';
				}
				?>
			</fieldset>
			
			<fieldset data-filter-group="dance" class="checkbox-group" data-logic="and">
				<label class="checkbox-group-label">Dance</label>
				<?php
				$danceSkills = ["ballet","ballroom","tap","swing","jazz"];
				
				foreach($danceSkills as $danceSkill){
	                echo '<div class="checkbox">';
	                    echo '<label class="checkbox-label">' . ucfirst($danceSkill) . '</label>';
	                    echo '<input type="checkbox" value=".' . $danceSkill . '"/>';
	                echo '</div>';
				}
				?>
			</fieldset>

			<fieldset data-filter-group="instrument" class="checkbox-group" data-logic="and">
				<label class="checkbox-group-label">Instrument</label>
				<?php
				$instSkills = ["perc","sax","banjo","piano","drums","cello","clarinet","trombone","trumpet","flute","violin","guitar"];
				
				foreach($instSkills as $instSkill){
	                echo '<div class="checkbox">';
	                    echo '<label class="checkbox-label">' . ucfirst($instSkill) . '</label>';
	                    echo '<input type="checkbox" value=".' . $instSkill . '"/>';
	                echo '</div>';
				}
				?>
			</fieldset>

			<fieldset data-filter-group="tech" class="checkbox-group" data-logic="and">
				<label class="checkbox-group-label">Technical</label>
				<?php
				$techSkills = [
					"set_design" => "Set Design",
					"lights" 	 => "Lights",
					"costume" 	 => "Costume",
					"box_office" => "Box Office",
					"props" 	 => "Props",	
				];	
				foreach($techSkills as $techKey => $techSkill){
	                echo '<div class="checkbox">';
	                    echo '<label class="checkbox-label">' . $techSkill . '</label>';
	                    echo '<input type="checkbox" value=".' . $techKey . '"/>';
	                echo '</div>';
				}
				?>
			</fieldset>

			<fieldset data-filter-group="misc" class="checkbox-group" data-logic="and">
				<label class="checkbox-group-label">Misc</label>
				<?php
				$miscSkills = ["shakes","cabaret","improv","mime","standup","acrobatics","juggling","puppetry","asl","painting","combat"];

				foreach($miscSkills as $miscSkill){
	                echo '<div class="checkbox">';
	                    echo '<label class="checkbox-label">' . ucfirst($miscSkill) . '</label>';
	                    echo '<input type="checkbox" value=".' . $miscSkill . '"/>';
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