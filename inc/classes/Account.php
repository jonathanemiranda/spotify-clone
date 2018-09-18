<?php
	/**
	 * 
	 */
	class Account
	{
		private $con;
		private $errorArray;

		function __construct($con)
		{
			$this->errorArray = array();
			$this->con = $con;
		}

		public function register($un, $fn, $ln, $em, $em2, $pw, $pw2){
			$this->validateUsername($un);
			$this->validateFirstName($fn);
			$this->validateLastName($ln);
			$this->validateEmails($em, $em2);
			$this->validatePasswords($pw, $pw2);

			if (empty($this->errorArray)) {
				return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
			}
			else{
				return false;
			}
		}

		public function getError($error){
			if (!in_array($error, $this->errorArray)) {
				$error = "";
			}
			return "<span class = 'errorMessage'>$error</span>";
		}

		private function insertUserDetails($un, $fn, $ln, $em, $pw){
			$encryptedPW = md5($pw);
			$profilePic = "assets/img/profilePics/blank-profile-picture-973460_640.png";
			$date = date("Y-m-d");
			$result = mysqli_query($this->con, "INSERT INTO users (username, firstName, lastName, email, password, date_created, profilePic) VALUES('$un', '$fn', '$ln', '$em', '$encryptedPW', '$date', '$profilePic')");
			return $result;

		}

		private function validateUsername($username){
			if(strlen($username) > 25 || strlen($username) < 5){
				array_push($this->errorArray, Constants::$usernameLength);
				return;
			}
			//TODO: Check if username already exists
		}

		private function validateFirstName($firstName){
			if(strlen($firstName) > 25 || strlen($firstName) < 2){
				array_push($this->errorArray, Constants::$firstNameLength);
				return;
			}
		}

		private function validateLastName($lastName){
			if(strlen($lastName) > 25 || strlen($lastName) < 2){
				array_push($this->errorArray, Constants::$lastNameLength);
				return;
			}
		}

		private function validateEmails($email, $email2){
			if($email != $email2){
				array_push($this->errorArray, Constants::$emailsDoNotMatch);
				return;
			}
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, Constants::$emailInvalid);
				return;
			}
			//TODO: Check that email has not been used before
		}

		private function validatePasswords($password, $password2){
			if($password != $password2){
				array_push($this->errorArray, Constants::$passwordsDoNotMatch);
				return;
			}
			if (preg_match('/[^A-Za-z0-9]/', $password)) {
				array_push($this->errorArray, Constants::$passwordInvalidChars);
				return;
			}
			if(strlen($password) > 25 || strlen($password) < 5){
				array_push($this->errorArray, Constants::$passwordLength);
				return;
			}
		}
	}


?>