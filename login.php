<?php
	include("inc/classes/Account.php");
	$account = new Account();
	include("inc/classes/Constants.php");

	include("inc/handlers/registerHandler.php");
	include("inc/handlers/loginHandler.php");

	function getInputValue($inputName){
		if ($_POST[$inputName]) {
			echo $_POST[$inputName];
		}
	}
	
?>
<!DOCTYPE html>
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
				<?php
				echo $account->getError(Constants::$usernameLength);
				?>
				<label for="registerUserName">Username</label>
				<input id="registerUserName" type="text" name="registerUserName" placeholder="Username" value="<?php getInputValue("registerUserName");?>"required>
			</p>
			<p>
				<?php
				echo $account->getError(Constants::$firstNameLength);
				?>
				<label for="registerFirstName">First Name</label>
				<input id="registerFirstName" type="text" name="registerFirstName" value="<?php getInputValue("registerFirstName");?>" required>
			</p>
			<p>
				<?php
				echo $account->getError(Constants::$lastNameLength);
				?>
				<label for="registerLastName">Last Name</label>
				<input id="registerLastName" type="text" name="registerLastName" value="<?php getInputValue("registerLastName");?>" required>
			</p>
			<p>
				<?php
				echo $account->getError(Constants::$emailsDoNotMatch);
				echo $account->getError(Constants::$emailInvalid);
				?>
				<label for="registerEmail">Email</label>
				<input id="registerEmail" type="email" name="registerEmail" value="<?php getInputValue("registerEmail");?>" required>
			</p>
			<p>
				
				<label for="registerConfirmEmail">Confirm Email</label>
				<input id="registerConfirmEmail" type="email" name="registerConfirmEmail" value="<?php getInputValue("registerConfirmEmail");?>" required>
			</p>
			<p>
				<?php
				echo $account->getError(Constants::$passwordsDoNotMatch);
				echo $account->getError(Constants::$passwordInvalidChars);
				echo $account->getError(Constants::$passwordLength);
				?>
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