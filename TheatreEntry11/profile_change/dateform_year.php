	echo "<select name=\"$dateform_yr\">";	  
	
	if($dateform_yr == "07") {
	  	echo "<option value=\"07\" selected>2007</option>"; }
		else {echo "<option value=\"07\">2007</option>";} 

	if($dateform_yr == "08") {
	  	echo "<option selected value=\"08\">2008</option>"; }
		else {echo "<option value=\"08\">2008</option>";}

	if($dateform_yr == "09") {
	  	echo "<option selected value=\"09\">2009</option>"; }
		else {echo "<option value=\"09\">2009</option>";}

	echo "</select>";	  
            