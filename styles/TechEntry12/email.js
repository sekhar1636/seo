

function validateFirstname(firstname)
{
	if(isBlank(firstname) )
		{
			alert("Enter Your First Name please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function validateLastname(lastname)
{
	if(isBlank(lastname) )
		{
			alert("Enter Your Last Name please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function validateAddress(address)
{
	if(isBlank(address) )
		{
			alert("Enter Your Address please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function validateCity(city)
{
	if(isBlank(city) )
		{
			alert("Enter Your City please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function validateState(state)
{
	if(isBlank(state) )
		{
			alert("Enter Your State please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function validateZip(zip)
{
	if(isBlank(zip) )
		{
			alert("Enter Your Zip please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function validateUsername(username)
{
	if(isBlank(username) )
		{
			alert("Enter Your Username please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function validatePassword(pass)
{
	if(isBlank(pass) )
		{
			alert("Enter Your Password please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function validateEmail(email)
{
	if(isBlank(email) )
		{
			alert("Enter Your Email please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function validatePhone(phone)
{
	if(isBlank(phone) )
		{
			alert("Enter Your Phone please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function validateLargeCity(largecity)
{
	if(isBlank(largecity) )
		{
			alert("Enter Your Nearest Large City please!");
			return false;
		}
	//if everythings okay, then
	return true;
}

function isBlank(testStr)
	{
	
//test for 0 length	
		if(testStr.length == 0)
			return true;

//test for all blank spaces
		for(var i=0; i<=testStr.length; i++)
				if(testStr.charAt(i) != " ")
					return false;
					
				return true;
	}