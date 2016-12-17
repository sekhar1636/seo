<?php
$role = $_POST['role'];
$show = $_POST['show'];


include("session.inc");
?>


<?php

//ROLESEARCH11REMOTE
//Jay Actor and Theatres excluded from search


echo "

<HTML>
<HEAD>
";

include("open_window.inc");

echo "
<TITLE>StrawHat Search for Actor Shows or Roles</TITLE>
<link rel=\"stylesheet\" href=\"/styles/members.css\" type=\"text/css\">
</HEAD>
<BODY BACKGROUND=\"../../graphics03/Bk10a.GIF\"><script src=\"navbar.js\"></script>
";

//create connection
include("../../Comm/connect.inc");


//ROLE AND SHOW------------------create sql statement
//if you have both a show and a role
if($role && $show) {

	trim($role);
	trim($show);

//add % symbol for LIKE sql search, to find fragments of role titles

$role = "%" . $role . "%";
$show = "%" . $show . "%";

$role = addslashes($role);	
$show = addslashes($show);

//search for a show
//exclude theatres 4447 11/24/10
$sql = "
SELECT roles_uid, actor_uid, lastname, firstname, midname,
actor_ID, item, pix_link,
role1, role2, role3, role4, role5,
role6, role7, role8, role9, role10,
show1, show2, show3, show4, show5,
show6, show7, show8, show9, show10
FROM actor11, roles11, rec11

WHERE item = \"AR\" AND actor_uid != 4447

AND actor_uid = roles_uid AND roles_uid = actor_ID  AND item = \"AR\"
AND role1 LIKE \"$role\" AND show1 LIKE \"$show\"

OR actor_uid = roles_uid AND roles_uid = actor_ID  AND item = \"AR\"
AND role2 LIKE \"$role\" AND show2 LIKE \"$show\"

OR actor_uid = roles_uid AND roles_uid = actor_ID AND item = \"AR\"
AND role3 LIKE \"$role\" AND show3 LIKE \"$show\"

OR actor_uid = roles_uid AND roles_uid = actor_ID  AND item = \"AR\"
AND role4 LIKE \"$role\" AND show4 LIKE \"$show\"

OR actor_uid = roles_uid AND roles_uid = actor_ID  AND item = \"AR\"
AND role5 LIKE \"$role\" AND show5 LIKE \"$show\"

OR actor_uid = roles_uid AND roles_uid = actor_ID  AND item = \"AR\"
AND role6 LIKE \"$role\" AND show6 LIKE \"$show\"

OR actor_uid = roles_uid AND roles_uid = actor_ID  AND item = \"AR\"
AND role7 LIKE \"$role\" AND show7 LIKE \"$show\"

OR actor_uid = roles_uid AND roles_uid = actor_ID  AND item = \"AR\"
AND role8 LIKE \"$role\" AND show8 LIKE \"$show\"

OR actor_uid = roles_uid AND roles_uid = actor_ID  AND item = \"AR\"
AND role9 LIKE \"$role\" AND show9 LIKE \"$show\"

OR actor_uid = roles_uid AND roles_uid = actor_ID  AND item = \"AR\"
AND role10 LIKE \"$role\" AND show10 LIKE \"$show\"

ORDER BY actor11.lastname ASC"
;
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");



echo "

<H2 align=center>Select Role/Show Search Results</H2>



<P align = \"center\">Please note: when you select a profile to review, it will open in a new window</p>
";

//strip slashes for role and show
$role_clean = htmlspecialchars(stripslashes($role));
$show_clean = htmlspecialchars(stripslashes($show));

echo "
<p align = \"center\"><strong>Search Results for \"$role_clean\" and \"$show_clean\" </p><td>



	<table width = \"40%\" border=0 align=\"center\" cellspacing=5 cellpadding=5>
	<tr>
		<th align=\"left\">Pix</th>
		<th align=\"left\">Name</th>
		</tr>
";


$count = 0;
//execute SQL query and get result

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");



//format results by row, reset array

	while($row = mysql_fetch_array($sql_result) ) {
	$actor_uid = $row["actor_uid"];
	$lastname = $row["lastname"];
	$firstname = $row["firstname"];
	$midname = $row["midname"];
	$pix_link = $row["pix_link"];
	$count++;

	if(empty($lastname)) {
			echo "<H2>No Match Found: Please try again.</H2>";
			exit();
	}

	else {

	
		
//format results under the contol
//format results by row, reset array


	echo "
	<tr>
			<td><IMG width=\"65\" SRC=\"ActorPix/$pix_link\"></td>
			<td><b>$lastname, $firstname $midname</b> <form name=\"form1\" method=\"post\" action=\"actor_searchlastname1.php\" target=\"myNewWin\">
	<input type=\"hidden\" name=\"sel_record\" value=\"$actor_uid\">
	<input type=\"submit\" value=\"Select Profile\" name=\"submit\" onClick=\"sendme()\">
	</form>
			
			</td>
			
		  </tr>


";
	}
}

echo "</table>;";

if(!$count) {echo "<p align = \"center\">No Match Found, please modify your search selections</p>";
	}
	else {
	echo "<p align = \"center\">Total Number of Records: $count</p>";	
	}

echo "

</BODY>
</HTML>
";

}

//if you have just a role 11/24/10
//exclue theatre 4447
else if($role && !$show) {
trim($role);

//add % symbol for LIKE sql search, to find fragments of role titles
$role = "%" . $role . "%";

$role = addslashes($role);	

$sql = "SELECT roles_uid, actor_uid, lastname, firstname, midname, pix_link,
role1, role2, role3, role4, role5,
role6, role7, role8, role9, role10
actor_ID, item

FROM actor11, roles11, rec11

WHERE actor11.actor_uid = roles11.roles_uid
AND roles11.roles_uid = rec11.actor_ID
AND item = \"AR\"
AND actor_uid != 4447

AND roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.role1 LIKE \"$role\"

OR roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.role2 LIKE \"$role\"

OR roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.role3 LIKE \"$role\"

OR roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.role4 LIKE \"$role\"

OR roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.role5 LIKE \"$role\"

OR roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.role6 LIKE \"$role\"

OR roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.role7 LIKE \"$role\"

OR roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.role8 LIKE \"$role\"

OR roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.role9 LIKE \"$role\"

OR roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.role10 LIKE \"$role\"

ORDER BY actor11.lastname ASC";


//execute SQL query and get result

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute roles input query.");


echo "

<H2 align=center>Select Role Search Results</H2>


<P align = \"center\">Please note: when you select a profile to review, it will open in a new window</p>
";

//strip slashes for role and show
$role_clean = htmlspecialchars(stripslashes($role));


echo "
<p align = \"center\"><strong>Search Results for \"$role_clean\"</p><td>
";

echo "

	<table width = \"40%\" border=0 align=\"center\" cellspacing=5 cellpadding=5>
	<tr>
		<th align=\"left\">Pix</th>
		<th align=\"left\">Name</th>
		</tr>
";

$count = 0;
//execute SQL query and get result

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");


//format results by row, reset array

	while($row = mysql_fetch_array($sql_result) ) {
	$actor_uid = $row["actor_uid"];
	$lastname = $row["lastname"];
	$firstname = $row["firstname"];
	$midname = $row["midname"];
	$pix_link = $row["pix_link"];
	$count++;

	if(empty($lastname)) {
			echo "<H2>No Match Found: Please try again.</H2>";
			exit();
	}

	else {

//format results under the contol
//format results by row, reset array


	echo "
	<tr>
			<td><IMG width=\"65\" SRC=\"ActorPix/$pix_link\"></td>
			<td><b>$lastname, $firstname $midname</b><BR>
			
			<form name=\"form1\" method=\"post\" action=\"actor_searchlastname1.php\" target=\"myNewWin\">
	<input type=\"hidden\" name=\"sel_record\" value=\"$actor_uid\">
	<input type=\"submit\" value=\"Select Profile\" name=\"submit\" onClick=\"sendme()\">
	</form>
			</td>
			
		  </tr>


";
	}
}

echo "</table>;";

if(!$count) {echo "<p align = \"center\">No Match Found, please modify your search selections</p>";
	}
	else {
	echo "<p align = \"center\">Total Number of Records: $count</p>";	
	}

echo "

</BODY>
</HTML>
";

}


//******************if you have a show and no role******************
else if($show and !$role) {
//exlude jay actor, theatres
trim($show);

//add % symbol for LIKE sql search, to find fragments of show titles
$show = "%" . $show . "%";
$show = addslashes($show);	


$sql = "SELECT roles_uid , actor_uid, lastname, firstname, midname, pix_link,
show1, show2, show3, show4, show5,
show6, show7, show8, show9, show10,
actor_ID, item
FROM actor11, roles11, rec11

WHERE actor_uid = roles_uid
AND roles_uid = actor_ID
AND item = \"AR\"
AND actor_uid != 0 AND actor_uid != 0
AND roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.show1 LIKE \"$show\"

OR roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.show2 LIKE \"$show\"

OR roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.show3 LIKE \"$show\"

OR roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.show4 LIKE \"$show\"

OR roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.show5 LIKE \"$show\"

OR roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.show6 LIKE \"$show\"

OR roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.show7 LIKE \"$show\"

OR roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.show8 LIKE \"$show\"

OR roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.show9 LIKE \"$show\"

OR roles11.roles_uid = actor11.actor_uid AND actor_uid = actor_ID AND item = \"AR\"
AND roles11.show10 LIKE \"$show\"


ORDER BY actor11.lastname ASC";

//execute SQL query and get result
$sql_result = mysql_query($sql,$connection) or die("Couldn't execute show input query.");

echo "
<H2 align=center>Select Show Search Results</H2>


<P align = \"center\">Please note: when you select a profile to review, it will open in a new window</p>
";

//strip slashes for role and show
$show_clean = htmlspecialchars(stripslashes($show));


echo "
<p align = \"center\"><strong>Search Results for \"$show_clean\"</p><td>
";

echo "

	<table width = \"40%\" border=0 align=\"center\" cellspacing=5 cellpadding=5>
	<tr>
		<th align=\"left\">Pix</th>
		<th align=\"left\">Name</th>
	</tr>
";

$count = 0;
//execute SQL query and get result

$sql_result = mysql_query($sql,$connection) or die("Couldn't execute input query.");


//format results by row, reset array

	while($row = mysql_fetch_array($sql_result) ) {
	$actor_uid = $row["actor_uid"];
	$lastname = $row["lastname"];
	$firstname = $row["firstname"];
	$midname = $row["midname"];
	$pix_link = $row["pix_link"];
	$count++;

	if(empty($lastname)) {
			echo "<H2>No Match Found: Please try again.</H2>";
			exit();
	}

	else {

//format results under the contol
//format results by row, reset array


	echo "
	<tr>
			<td><IMG width=\"65\" SRC=\"ActorPix/$pix_link\"></td>
			<td><b>$lastname, $firstname $midname</b>
			<br>
			<form name=\"form1\" method=\"post\" action=\"actor_searchlastname1.php\" target=\"myNewWin\">
	<input type=\"hidden\" name=\"sel_record\" value=\"$actor_uid\">
	<input type=\"submit\" value=\"Select Profile\" name=\"submit\" onClick=\"sendme()\">
	</form>
			</td>
		  </tr>


";
	}
}

echo "</table>";

if(!$count) {echo "<p align = \"center\">No Match Found, please modify your search selections</p>";
	}
	else {
	echo "<p align = \"center\">Total Number of Records: $count</p>";	
	}

echo "

</BODY>
</HTML>
";

}



else {
	echo "<H2>No Show or Role was entered. Please go back to enter the Role and/or Show.</H2>";
	exit;
	}
?>