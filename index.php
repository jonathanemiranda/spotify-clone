<?php
	include("inc/config.php");

	//MANUAL LOGOUT
	// session_destroy();

	if (isset($_SESSION['userLoggedIn'])) {
		$userLoggedIn = $_SESSION['userLoggedIn'];
	}
	else{
		header("Location: login.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Spotify Clone</title>
</head>
<body>
	<a href="login.php">Login or Sign Up</a>

</body>
</html>