<?php
/*LOAD CONTROLLER*/
$ActorController = new \App\Controller\ActorController;

/*Define Current Actor*/
$actor = $ActorController->single();

/*Build Page Title*/
if ($actor['active'] == TRUE){$title = ' | ' . $actor['name']['main'];}else{$title = '';}
?>
<?php include VIEWS_DIR_PATH . 'actor/_layouts/main.header.php';?>

<?php if($actor['active'] == TRUE){?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3">
				<div class="panel panel-info">
					<div class="panel-heading <?php echo $actor['object']['physical']['gender'];?>">
						<h2 class="panel-title">
							<?php echo $actor['name']['main'];?>
							<span class="pull-right">
								<span class="glyphicon glyphicon-earphone"></span>&nbsp;<?php echo $actor['phone'];?>
								&nbsp;|&nbsp;
								<span class="glyphicon glyphicon-envelope"></span>
									<a href="mailto:<?php echo $actor['object']['email']?>"><?php echo $actor['object']['email']?></a>
							</span>
						</h2>
					</div>
		            <div class="panel-body">
		              <div class="row">
		                <div class="col-sm-4 col-md-4 col-lg-4 text-center" align="center">
			            	<img alt="Actor Picture" src="<?php echo $actor['image'];?>" class="img-circle img-responsive"><br/>
							<?php								
								if ($actorResume = $actor['resume']){
									echo '<a href="' . $actorResume . '" class="btn btn-sm btn-primary" target="_blank"><span class="glyphicon glyphicon-download"></span> ' . $actor['name']['short'] . '\'s Resume</a>';
								}
							?>	
			            </div><!--END col-md-4 col-lg-4-->
		                <div class="col-sm-8 col-md-8 col-lg-8">
			                <div class="row">
				                <div class="col-sm-5">
					                <strong>Hair: </strong><?php echo $actor['hair'];?><br/>
					                <strong>Eyes: </strong><?php echo $actor['eyes'];?><br/>
					                <strong>Height: </strong><?php echo $actor['height'];?><br/>
					                <strong>Weight: </strong><?php echo $actor['object']['physical']['wt'];?> lbs<br/>
					                <strong>Age: </strong><?php echo $actor['object']['physical']['age_range'];?><br/>
				                </div>
				                <div class="col-sm-7">
					                <strong>Applied for: </strong><br/>
					                	<?php echo $actor['audition_type'];?><br/>
					                <strong>Employment Availability: </strong><br/>
					                	<?php echo $actor['availableFor'] . ' to ' . $actor['availableTo'];?><br/>
					                <strong>Will consider: </strong><br/>
					                	<?php
							                if($actor['object']['audition']['apprentice']){echo 'Apprentice, ';}
							                if($actor['object']['audition']['intern']){echo 'Internship';}
						                ?>
				                </div>
			                </div><div class="clearfix"></div><br/>
			                <div class="row">
				                <div class="col-sm-12">
					                <strong>Role Type: </strong> <?php echo $actor['ethnicity'];?><br/>
					                <strong>Vocal Range: </strong> <?php echo $actor['vocal'];?><br/>
									<strong>Dance <em>(number of years studied)</em>: </strong> <?php echo $actor['danceSkills'];?><br/>
									<strong>Instruments <em>(number of years studied)</em>: </strong>	<?php echo $actor['instrumentSkills'];?><br/>
									<strong>Technical Skills <em>(1 = Beginner, 2 = Good, 3 = Excellent)</em>: </strong><br/><?php echo $actor['techSkills'];?><br/><br/>
									<strong>Other Skills: </strong> <?php echo $actor['miscSkills'];?><br/>
									<strong>Schools: </strong> <?php echo $actor['object']['roles']['school'];?><br/>
						            <?php
							        if( ($actor['object']['url1'])||($actor['object']['url2'])){
							        ?>    
							            <strong>Web Link(s): </strong><ul>
							            <?php
								            if($actor['object']['url1']){
									            echo '<li><a href="' . $ActorController->addScheme($actor['object']['url1']) . '" target="_blank">';
									            	echo $actor['object']['url1'];
									            echo '</a></li>';
									        }
								            if($actor['object']['url2']){
									            echo '<li><a href="' . $ActorController->addScheme($actor['object']['url2']) . '" target="_blank">';
									            	echo $actor['object']['url2'];
									            echo '</a></li>';
									        }
								        ?>
							            </ul>
							        <?php    
						            }
						            ?>
				                </div>
			                </div>
		                </div><!--END .col-md-8 col-lg-8-->
		              </div><!--END .row-->
		            </div><!--END .panel-body"-->
					<div class="panel-footer"></div>
		        </div><!--END .panel panel-info-->
			</div>
		</div>
		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2">
				<table class="table table-striped table-bordered table-hover table-condensed">
					<thead><tr><th>Role</th><th>Show</th><th>Theater</th><th>Dir/Choreo/Other</th></tr></thead>
					<tbody>
						<?php
						foreach ($actor['roles'] as $role){
							echo '<tr>';
								echo '<td>' . $role['show'] . '</td>';
								echo '<td>' . $role['role'] . '</td>';
								echo '<td>' . $role['theater'] . '</td>';
								echo '<td>' . $role['director'] . '</td>';
							echo '<tr>';
						}	
						?>
					</tbody>
				</table>
			</div>
		</div>
		
	</div><!--END .container-fluid-->
    
<?php }else{echo 'No Actor by that ID';}?>
<?php
/*
echo '<pre>';
	var_dump($actor);
echo '</pre>';	
*/
?>
<?php include VIEWS_DIR_PATH . 'actor/_layouts/main.footer.php';?>