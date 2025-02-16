<?php
// Sign up page
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Clock | Sign-Up</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link href="css/landing.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="signUp">
			<form action="addAccount.php" method="post"> <!--Makes sure that the same errors are not presented if the user goes to a different page-->
				<div>
					<input type="text" name="Username" placeholder="Username" id="username" autocomplete="username" onpaste="usernamePaste(event)" required>
					<input type="password" name="Password1" placeholder="Password" id="password" autocomplete="new-password" required>
					<input type="password" name="Password2" placeholder="Confirm Password" id="confirm-password" autocomplete="new-password" required>
					<input type="email" name="Email" placeholder="Email" id="email" autocomplete="email" required>
                    <input type='hidden' name='Premium' id="premium" value="">
					<input type="submit" value="Sign-Up" onclick="save()">
					<a href="login.php" class="already">Already have an account?</a>
				</div>
			</form>
			<!-- sets the displays of the checklist and all the items in the checklist using the values stored in their respective session variables -->
			<div id="message"
			<?php
				if (isset($_SESSION["messageDisplay"])) {
					echo "style=display:".$_SESSION["messageDisplay"];
				}
				
			?>
			>
				<p id="username-checkbox" class=
				<?php
					if (isset($_SESSION["usernameClass"])) {
						echo $_SESSION["usernameClass"];
					}
					else {
						echo "valid";
					}
				?>
				><?php
					if (isset($_SESSION["usernameSuggestion"]) && $_SESSION["usernameSuggestion"] != NULL) {
						echo "Username must be unique, try " . $_SESSION['usernameSuggestion'];
					}
					else {
						echo "Username must be unique";
					}
				?>
				</p>
				<p id="email-checkbox" class=
				<?php
					if (isset($_SESSION["emailClass"])) {
						echo $_SESSION["emailClass"];
					}
					else {
						echo "valid";
					}
				?>
				>Email must be unique
				</p>
				<p id="letter" class=
				<?php 
					if (isset($_SESSION["letterClass"])) {
						echo $_SESSION["letterClass"];
					} 
					else {
						echo "invalid";
					}?>>Password must have a <b>letter</b></p>
				<p id="number" class=
				<?php 
					if (isset($_SESSION["numberClass"])) {
						echo $_SESSION["numberClass"];
					} 
					else {
						echo "invalid";
					}?>>Password must have a <b>number</b></p>
				<p id="special" class=
				<?php 
					if (isset($_SESSION["specialClass"])) {
						echo $_SESSION["specialClass"];
					} 
					else {
						echo "invalid";
					}?>>Password must have a <b>special character</b></p>
				<p id="length" class=
				<?php 
					if (isset($_SESSION["lengthClass"])) {
						echo $_SESSION["lengthClass"];
					} 
					else {
						echo "invalid";
					}?>>Password must be at least <b>6 characters</b></p>
				<p id="match" class=
				<?php 
					if (isset($_SESSION["matchClass"])) {
						echo $_SESSION["matchClass"];
					} 
					else {
						echo "invalid";
					}?>>Passwords <b>must match</b></p>
			</div>
			<script>
				function save() {
					var signUpUsername = document.getElementById("username").value;
					localStorage.setItem("signUpUsername", signUpUsername); 

					var signUpEmail = document.getElementById("email").value;
					localStorage.setItem("signUpEmail", signUpEmail); 

					var signUpPassword = document.getElementById("password").value;
					localStorage.setItem("signUpPassword", signUpPassword); 

					var signUpPassword2 = document.getElementById("confirm-password").value;
					localStorage.setItem("signUpPassword2", signUpPassword2); 

				}
	
			</script>
			<script>
				// doesn't get rid of the values entered by the user even if they are wrong to allow the user to change them themself
				document.getElementById("username").value = localStorage.getItem('signUpUsername');
				document.getElementById("email").value = localStorage.getItem('signUpEmail');
				document.getElementById("password").value = localStorage.getItem('signUpPassword');
				document.getElementById("confirm-password").value = localStorage.getItem('signUpPassword2');
                document.getElementById("premium").value = localStorage.getItem('signUpPremium');
			</script>
			<script>
				var password1 = document.getElementById("password");
				var password2 = document.getElementById("confirm-password");
				var letter = document.getElementById("letter");
				var special = document.getElementById("special");
				var number = document.getElementById("number");
				var length = document.getElementById("length");
				var match = document.getElementById("match");

				// When the user starts to type something inside the password field
				password1.onkeyup = function() {
					document.getElementById("message").style.display = "block";
					if (password2.value == password1.value) {
						match.classList.remove("invalid");
						match.classList.add("valid");
					}
					else {
						match.classList.remove("valid");
						match.classList.add("invalid");
					}
					
					// Validate letters
					var letters = /[A-Za-z]/g;
					if(password1.value.match(letters)) {
						letter.classList.remove("invalid");
						letter.classList.add("valid");
					} else {
						letter.classList.remove("valid");
						letter.classList.add("invalid");
					}

					// Validate special characters
					var specialChars = /[^A-Za-z0-9]/g;
					if(password1.value.match(specialChars)) {
						special.classList.remove("invalid");
						special.classList.add("valid");
					} else {
						special.classList.remove("valid");
						special.classList.add("invalid");
					}

					// Validate numbers
					var numbers = /[0-9]/g;
					if(password1.value.match(numbers)) {
						number.classList.remove("invalid");
						number.classList.add("valid");
					} else {
						number.classList.remove("valid");
						number.classList.add("invalid");
					}

					// Validate length
					if(password1.value.length >= 6) {
						length.classList.remove("invalid");
						length.classList.add("valid");
					} else {
						length.classList.remove("valid");
						length.classList.add("invalid");
					}
					// if nothing is entered in any of the boxes, dont display the checklist
					if (password1.value.length == 0 && password2.value.length == 0 && username.value.length == 0 && email.value.length == 0) {
						document.getElementById("message").style.display = "none";
					}
				}

				// when the user starts to type something in the confirm password box
				password2.onkeyup = function() {
					document.getElementById("message").style.display = "block";
					// check whether the two passwords match
					if (password2.value == password1.value) {
						match.classList.remove("invalid");
						match.classList.add("valid");
					}
					else {
						match.classList.remove("valid");
						match.classList.add("invalid");
					}
					// if nothing is entered in any of the boxes, dont display the checklist
					if (password1.value.length == 0 && password2.value.length == 0 && username.value.length == 0 && email.value.length == 0) {
						document.getElementById("message").style.display = "none";
					}
				}

				var usernameCheckbox = document.getElementById("username-checkbox");
				var username = document.getElementById("username");

				username.addEventListener('keydown', function(event) {
					illegals = ['\\',"'","\"", ">", "<", "@"]; // characters that are not allowed to be in a username
					if (illegals.includes(event.key)) { // if the current typed character is an illegal one
						event.preventDefault(); // dont add the character to the box
					}
					if (username.value.includes(" ")) { // when space is clicked twice on a mac it adds a period and a space
						username.value = username.value.replace(" ",""); // gets rid of the space
					}
				}, false);

				function usernamePaste(e) {
					var key = e.clipboardData.getData('text')
					for (let i = 0; i < illegals.length; i++) {
						if (key.includes(illegals[i])) {
							e.preventDefault();
							return;
						}
					}
					if (key.includes(' ')) {
						e.preventDefault();
					}
				}

				username.onkeyup = function() {
					var cursor = this.selectionStart;
					if (username.value.includes(" ")) { // when space is clicked twice on a mac it adds a period and a space
						username.value = username.value.replace(" ",""); // gets rid of the space
						this.setSelectionRange(cursor-1,cursor-1);
					}
					document.getElementById("message").style.display = "block";
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
						var response = JSON.parse(this.responseText);
							if (response.numUsers == 0) { // if the username is unique
								usernameCheckbox.classList.remove("invalid");
								usernameCheckbox.classList.add("valid");
								usernameCheckbox.innerHTML = "Username must be unique";
							}
							else {
								usernameCheckbox.classList.remove("valid");
								usernameCheckbox.classList.add("invalid");
								usernameCheckbox.innerHTML = "Username must be unique, try "+response.suggestion;
							}
						}
					};
					xmlhttp.open("GET", "checkAccount.php?checkbox=1&username="+username.value, true);
					xmlhttp.send();
					// if nothing is entered in any of the boxes, dont display the checklist
					if (password1.value.length == 0 && password2.value.length == 0 && username.value.length == 0 && email.value.length == 0) {
						document.getElementById("message").style.display = "none";
					}
				}

				var emailCheckbox = document.getElementById("email-checkbox");
				var email = document.getElementById("email");

				email.onkeyup = function() {
					document.getElementById("message").style.display = "block";
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							var response = JSON.parse(this.responseText);

							emailCheckbox.classList.remove(response.removeEmailClass);
							emailCheckbox.classList.add(response.addEmailClass);
						}
					};
					xmlhttp.open("GET", "checkAccount.php?checkbox=1&email="+email.value, true);
					xmlhttp.send();
					// if nothing is entered in any of the boxes, dont display the checklist
					if (password1.value.length == 0 && password2.value.length == 0 && username.value.length == 0 && email.value.length == 0) {
						document.getElementById("message").style.display = "none";
					}
				}
				
			</script>
		</div>
	</body>
</html>
