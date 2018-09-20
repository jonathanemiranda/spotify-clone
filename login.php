<?php
	include("inc/config.php");
	include("inc/classes/Account.php");
	$account = new Account($con);
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="inc/assets/js/login.js"></script>

	<link rel="stylesheet" type="text/css" href="inc/assets/css/login.css">

	<title>Welcome to Slotify</title>
</head>
<body>
	<?php
		if (isset($_POST['registerButton'])) {
			echo '<script type="text/javascript">
					$(document).ready(function(){
						$("#loginForm").hide();
						$("#registerForm").show();
					})

					</script>';
			}
		else{
			echo '<script type="text/javascript">
					$(document).ready(function(){
						$("#loginForm").show();
						$("#registerForm").hide();
					})

				</script>';

		}
	?>

	<div id="background">
		<div id="loginContainer">
			<div id="inputContainer">
				<form id="loginForm" action="login.php" method="POST">
					<h2>Log In to Your Account</h2>
					<p>
						<?php
						echo $account->getError(Constants::$loginFailed);
						?>
						<label for="loginUsername">Username</label>
						<input id="loginUsername" type="text" name="loginUsername" value="<?php getInputValue("loginUsername");?>" required>
					</p>
					<p>
						<label for="loginPassword">Password</label>
						<input id="loginPassword" type="password" name="loginPassword" required>
					</p>
					<button type="submit" name="loginButton">Log In</button>
					<div class="hasAccountText">
						<span id="hideLogin">Don't have an account yet? Sign up here</span>
					</div>
				</form>

				<form id="registerForm" action="login.php" method="POST">
					<h2>Create Your Account</h2>

					<p>
						<?php
						echo $account->getError(Constants::$usernameLength);
						echo $account->getError(Constants::$usernameTaken);
						?>
						<label for="registerUserName">Username</label>
						<input id="registerUserName" type="text" name="registerUserName" value="<?php getInputValue("registerUserName");?>"required>
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
						echo $account->getError(Constants::$emailTaken);
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
					<div class="hasAccountText">
						<span id="hideRegister">Already have an account? Sign in here</span>
					</div>
				</form>
			</div>
			<div id="loginText">
				<h1>Get great music, right now</h1>
				<h2>Listen to loads of songs for free</h2>
				<ul>
					<li>Discover music you'll fall in love with</li>
					<li>Create your own playlists</li>
					<li>Follow artists to keep up to date</li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>