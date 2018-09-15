<?php
	/**
	 * 
	 */
	class Account
	{
		private $errorArray;

		function __construct()
		{
			$this->errorArray = array();
		}

		public function register($un, $fn, $ln, $em, $em2, $pw, $pw2){
			$this->validateUsername($un);
			$this->validateFirstName($fn);
			$this->validateLastName($ln);
			$this->validateEmails($em, $em2);
			$this->validatePasswords($pw, $pw2);
		}

		private function validateUsername($username){
			if(strlen($username) > 25 || strlen($username) < 5){
				array_push($this->errorArray, "Usernames must be between 6 and 24 characters");
				return;
			}
			//TODO: Chekc if username already exists
		}

		private function validateFirstName($firstName){
			if(strlen($firstName) > 25 || strlen($firstName) < 2){
				array_push($this->errorArray, "First name must be between 3 and 24 characters");
				return;
			}
		}

		private function validateLastName($lastName){
			if(strlen($lastName) > 25 || strlen($lastName) < 2){
				array_push($this->errorArray, "Last name must be between 3 and 24 characters");
				return;
			}
		}

		private function validateEmails($email, $email2){
			if($email != $email2){
				array_push($this->errorArray, "Email addresses do not match");
				return;
			}
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, "Email addresses is not valid");
				return;
			}
			//TODO: Check that email has not been used before
		}

		private function validatePasswords($password, $password2){
			if($password != $password2){
				array_push($this->errorArray, "Passwords do not match");
				return;
			}
			if (preg_match('/[^A-Za-z0-9]/', $password)) {
				array_push($this->errorArray, "Passwords can only contain letters and numbers");
				return;
			}
			if(strlen($password) > 25 || strlen($password) < 5){
				array_push($this->errorArray, "Your password must be between 6 and 24 characters");
				return;
			}
		}
	}


?>