<?php include "base.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>User Management System (Tom Cameron for NetTuts)</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>  
<body>  
<div id="main">
<?php
if(!empty($_POST['email']) && !empty($_POST['password']))
{
    $password = md5(mysql_real_escape_string($_POST['password']));
    $email = mysql_real_escape_string($_POST['email']);
	$forename = mysql_real_escape_string($_POST['forename']);
	$surname = mysql_real_escape_string($_POST['surname']);
    
	 $checkemail = mysql_query("SELECT * FROM member WHERE Email = '".$email."'");
     
     if(mysql_num_rows($checkemail) == 1)
     {
     	echo "<h1>Error</h1>";
        echo "<p>Sorry, that Email Addresss is taken. Please go back and try again.</p>";
     }
     else
     {
     	$registerquery = mysql_query("INSERT INTO member (Email, Password, Forename, Surname) VALUES('".$email."', '".$password."', '".$forename."', '".$surname."')");
        if($registerquery)
        {
        	echo "<h1>Success</h1>";
        	echo "<p>Your account was successfully created. Please <a href=\"index.php\">click here to login</a>.</p>";
        }
        else
        {
     		echo "<h1>Error</h1>";
        	echo "<p>Sorry, your registration failed. Please go back and try again.</p>";    
        }    	
     }
}
else
{
	?>
    
   <h1>Register</h1>
    
   <p>Please enter your details below to register.</p>
    
	<form method="post" action="register.php" name="registerform" id="registerform">
	<fieldset>
		<label for="email">Email:</label><input type="text" name="email" id="email" /><br />
		<label for="password">Password:</label><input type="password" name="password" id="password" /><br />
		<label for="forename">Forename:</label><input type="text" name="forename" id="forename" /><br />
		<label for="surname">Surname:</label><input type="text" name="surname" id="surname" /><br />
		<input type="submit" name="register" id="register" value="Register" />
	</fieldset>
	</form>
    
   <?php
}
?>
</div>
</body>
</html>