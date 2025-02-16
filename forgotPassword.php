<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Clock | Forgot Password</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link href="css/landing.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="login">
			<form action="sendEmail.php" method="post">
				<input type="text" name="Forgot" placeholder="Email or Username" id="email" autocomplete="email" required>
				<input type="submit" value="Reset">
			</form>
			<div id="message" style="display:none">
			<p id="username-checkbox" class="invalid">
				This email or username is not associated with an account
			</p>
			</div>
			<script>
				if (document.referrer == window.location.href) {
					document.getElementById("message").style.display = "block";
				}
				else {
					document.getElementById("message").style.display = "none";
				}
			</script>
		</div>
	</body>
</html>