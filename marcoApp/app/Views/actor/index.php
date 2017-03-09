<?php
/*LOAD CONTROLLER*/
$ActorController = new \App\Controller\ActorController;

/*Define Current Actor*/
$actor = $ActorController->single();
?>
<?php include VIEWS_DIR_PATH . 'actor/_layouts/main.header.php';?>

<?php if($actor['active'] == TRUE){?>
	<div class="container-fluid">
		<div class="main <?php echo $actor['object']['physical']['gender'];?>">
	

		</div>
	</div>
<?php }else{echo 'No Actor by that ID';}?>


<div class="container-fluid">
	
	<!--ACTOR DETAILS-->
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo $actor['name']['main'];?></h3>
				</div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="Actor Picture" src="<?php echo $actor['image'];?>" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                    <!--  <tr>
                        <td>Department:</td>
                        <td>Programming</td>
                      </tr>
                      <tr>
                        <td>Hire date:</td>
                        <td>06/23/2013</td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td>01/24/1988</td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Gender</td>
                        <td>Female</td>
                      </tr>
                        <tr>
                        <td>Home Address</td>
                        <td>Kathmandu,Nepal</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:info@support.com">info@support.com</a></td>
                      </tr>
                        <td>Phone Number</td>
                        <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                        </td>
                           
                      </tr>-->
                     
                    </tbody>
                  </table>
                  
                  <!--<a href="#" class="btn btn-primary">My Sales Performance</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a>-->
                </div>
              </div>
            </div>
			<div class="panel-footer">
				<?php
				if ($actorResume = $actor['resume']){
					echo '<a href="' . $actorResume . '" class="btn btn-sm btn-primary" target="_blank"><span class="glyphicon glyphicon-download"></span> ' . $actor['name']['short'] . '\'s Resume</a>';
				}
				?>				
			<span class="pull-right">
				<a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
				<a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
			</span>
			</div>
            
          </div>
        </div>
      </div>
    </div>

<?php
echo '<pre>';
	var_dump($actor);
echo '</pre>';	
?>	

<?php include VIEWS_DIR_PATH . 'actor/_layouts/main.footer.php';?>