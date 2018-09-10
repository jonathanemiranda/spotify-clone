<!DOCTYPE html>
<?php

	function sanitizeFormPassword($inputText){
		$inputText = strip_tags($inputText);
		return $inputText;
	}

	function sanitizeFormUsername($inputText){
		$inputText = strip_tags($inputText);
		$inputText = str_replace(" ", "", $inputText);
		return $inputText;
	}

	function sanitizeFormString($inputText){
		$inputText = strip_tags($inputText);
		$inputText = str_replace(" ", "", $inputText);
		$inputText = ucfirst(strtolower($inputText));;
		return $inputText;
	}

	if (isset($_POST['loginButton'])) {
		//Login
		echo "Login Button Was Pressed";
	}

	if (isset($_POST['registerButton'])) {
		//Register
		$registerUserName = sanitizeFormUsername($_POST['registerUserName']);
		$registerFirstName = sanitizeFormString($_POST['registerFirstName']);
		$registerLastName = sanitizeFormString($_POST['registerLastName']);
		$registerEmail = sanitizeFormString($_POST['registerEmail']);
		$registerConfirmEmail = sanitizeFormString($_POST['registerConfirmEmail']);
		$registerPassword = sanitizeFormPassword($_POST['registerPassword']);
		$registerConfirmPassword = sanitizeFormPassword($_POST['registerConfirmPassword']);
	}
?>


<html>
<head>
	<title>Welcome to Slotify</title>
</head>
<body>
	<div id="inputContainer">
		<form id="loginForm" action="login.php" method="POST">
			<h2>Log In to Your Account</h2>
			<p>
				<label for="loginUsername">Username</label>
				<input id="loginUsername" type="text" name="loginUsername" placeholder="Username" required>
			</p>
			<p>
				<label for="loginPassword">Password</label>
				<input id="loginPassword" type="password" name="loginPassword" required>
			</p>
			<button type="submit" name="loginButton">Log In</button>
		</form>

		<form id="registerForm" action="login.php" method="POST">
			<h2>Create Your Account</h2>
			<p>
				<label for="registerUserName">Username</label>
				<input id="registerUserName" type="text" name="registerUserName" placeholder="Username" required>
			</p>
			<p>
				<label for="registerFirstName">First Name</label>
				<input id="registerFirstName" type="text" name="registerFirstName"required>
			</p>
			<p>
				<label for="registerLastName">Last Name</label>
				<input id="registerLastName" type="text" name="registerLastName" required>
			</p>
			<p>
				<label for="registerEmail">Email</label>
				<input id="registerEmail" type="email" name="registerEmail" required>
			</p>
			<p>
				<label for="registerConfirmEmail">Confirm Email</label>
				<input id="registerConfirmEmail" type="email" name="registerConfirmEmail" required>
			</p>
			<p>
				<label for="registerPassword">Password</label>
				<input id="registerPassword" type="password" name="registerPassword" required>
			</p>
			<p>
				<label for="registerConfirmPassword">Confirm Password</label>
				<input id="registerConfirmPassword" type="password" name="registerConfirmPassword" required>
			</p>
			<button type="submit" name="registerButton">Sign Up</button>
		</form>
	</div>
</body>
</html>