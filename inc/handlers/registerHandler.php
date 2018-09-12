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

	function validateUsername($username){

	}

	function validateFirstName($firstName){

	}

	function validateLastName($lastName){

	}

	function validateEmails($email, $email2){

	}

	function validatePasswords($password, $password2){

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
		validateUsername($registerUserName);
		validateFirstName($registerFirstName);
		validateLastName($registerLastName);
		validateEmails($registerEmail, $registerConfirmEmail);
		validatePasswords($registerPassword, $registerConfirmPassword);




	}
?>