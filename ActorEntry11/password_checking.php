 //check to be added	
$c_username = $username;
$c_pass = $pass;

//add slashes to check for existing names.
$c_username = addslashes($c_username);
$c_pass = addslashes($c_pass);


	$checkname = "SELECT username, pass
		FROM pwd07 
		WHERE username = '$c_username'AND
		pass = '$c_pass'
		";

include("connect.inc");

/*execute SQL query for checking duplicate names*/
$check_result = mysql_query($checkname,$connection) or die("Couldn't execute CheckName query on Pwd Table.");

	if (!$check_result){
	echo "<P>No CheckName Result</P>";
	exit;	}

	elseif(mysql_num_rows($check_result) !=0) {
		echo "<h2>$c_username,  $c_pass already exists; please use another name.<br>
		Use your back button to re-enter your username and password information.
		";
		echo "</h2></BODY></HTML>";
		exit;}

	else {
	
	for passwords: 
if(crypt($p_entered,$pass)!= $pass)