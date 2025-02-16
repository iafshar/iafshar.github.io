<?php session_start();
$_SESSION["Error"] = NULL; // This will be a string containing all the errors the user has made when trying to login or sign-up
session_unset();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Clock | Welcome</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link href="css/landing.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<h1 class="clock">CLOCK</h1>
		<div class="start">
			<form>
				<a href="choose.html" class="signUpBtn">Sign-Up</a>
				<a href="Clock_NoAccount/index.html" class="noAccountBtn">No Account</a>
				<a href="login.php" class="loginBtn">Login</a>
			</form>
		</div>
		<script>
			// removes all these items from localStorage incase another user signs in or something
			localStorage.removeItem("loginUsername");
			localStorage.removeItem("signUpUsername");
    		localStorage.removeItem("signUpEmail");
			localStorage.removeItem("signUpPassword");
			localStorage.removeItem("signUpPassword2");
			localStorage.removeItem("resetPassword"); 
			localStorage.removeItem("resetPassword2"); 
		</script>
	</body>
</html>
