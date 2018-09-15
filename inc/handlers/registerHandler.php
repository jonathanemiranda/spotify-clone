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


	if (isset($_POST['registerButton'])) {
		//Register
		$registerUserName = sanitizeFormUsername($_POST['registerUserName']);
		$registerFirstName = sanitizeFormString($_POST['registerFirstName']);
		$registerLastName = sanitizeFormString($_POST['registerLastName']);
		$registerEmail = sanitizeFormString($_POST['registerEmail']);
		$registerConfirmEmail = sanitizeFormString($_POST['registerConfirmEmail']);
		$registerPassword = sanitizeFormPassword($_POST['registerPassword']);
		$registerConfirmPassword = sanitizeFormPassword($_POST['registerConfirmPassword']);

		$success = $account->register($registerUserName, $registerFirstName, $registerLastName, $registerEmail, $registerConfirmEmail, $registerPassword, $registerConfirmPassword);

		if($success) {
			header("Location: index.php");	
		}

	}
?>