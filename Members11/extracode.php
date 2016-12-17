<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF" text="#000000">

</body>
</html>

//extra code
//---------------------------------old instrument sql statement
$sql ="SELECT skills11.skills_uid , actor11.actor_uid, actor11.lastname, actor11.firstname, actor11.midname, actor11.pix_link,
skills11.banjo, skills11.drums, skills11.perc, skills11.trombone,
skills11.cello, skills11.flute, skills11.piano, skills11.trumpet,
skills11.clarinet, skills11.guitar, skills11.sax, skills11.violin,
rec11.actor_ID, rec11.item
FROM actor11, skills11, rec11

WHERE skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.banjo >= \"$banjo\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.drums >= \"$drums\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.perc >= \"$perc\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.trombone >= \"$trombone\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.cello >= \"$cello\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.flute >= \"$flute\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.piano >= \"$piano\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.trumpet >= \"$trumpet\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.clarinet >= \"$clarinet\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.guitar >= \"$guitar\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.sax >= \"$sax\"
AND skills11.skills_uid = actor11.actor_uid AND actor11.actor_uid = rec11.actor_ID
AND skills11.violin >= \"$violin\"
AND item = \"AR\"
ORDER BY actor11.lastname ASC";

From physical search

/*old sql statements
OR gender =\"$gender\" 
OR phys_uid = actor_uid AND hair = \"$hair\"
OR phys_uid = actor_uid AND eye = \"$eye\"
OR phys_uid = actor_uid AND age_range = \"$age_range\"

OR phys_uid = actor_uid AND nativeam = \"$nativeam\"
OR phys_uid = actor_uid AND asian = \"$asian\"
OR phys_uid = actor_uid AND white = \"$white\"
OR phys_uid = actor_uid AND black = \"$black\"
OR phys_uid = actor_uid AND hispanic = \"$hispanic\"
OR phys_uid = actor_uid AND eeurope = \"$eeurope\"
OR phys_uid = actor_uid AND mideast = \"$mideast\"
OR phys_uid = actor_uid AND indian = \"$indian\"
ORDER BY lastname ASC";
//end of old sql statements 
*/

