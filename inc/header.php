<?php
	include("inc/config.php");
	include("inc/classes/Artist.php");
	include("inc/classes/Album.php");
	include("inc/classes/Song.php");

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
	<link rel="stylesheet" type="text/css" href="inc/assets/css/index.css">
	<title>Spotify Clone</title>
</head>
<body>
	<div id="mainContainer">
		<div id="topContainer">
			<?php
				include("inc/navBarContainer.php");
			?>
			<div id="mainViewContainer">
				<div id="mainContent">