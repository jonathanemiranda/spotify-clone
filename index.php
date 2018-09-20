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
	<link rel="stylesheet" type="text/css" href="inc/assets/css/index.css">
	<title>Spotify Clone</title>
</head>
<body>
	<div id="nowPlayingContainer">
		<div id="nowPlayingBar">
			<div id="nowPlayingLeft">
				<div class="content">
					<span class="albumLink">
						<img src="inc/assets/img/icons/shuffle.png" class="albumArt">
					</span>
				</div>
			</div>
			<div id="nowPlayingCenter">
				<div class="content playerControls">
					<div class="buttons">
						<button class="controlButton shuffle" title="Shuffle Button">
							<img src="inc/assets/img/icons/shuffle.png" alt="Shuffle">
						</button>
						<button class="controlButton previous" title="Previous Button">
							<img src="inc/assets/img/icons/previous.png" alt="Previous">
						</button>
						<button class="controlButton play" title="Play Button">
							<img src="inc/assets/img/icons/play.png" alt="Play">
						</button>
						<button class="controlButton pause" title="Pause Button">
							<img src="inc/assets/img/icons/pause.png" alt="Pause">
						</button>
						<button class="controlButton next" title="Next Button">
							<img src="inc/assets/img/icons/next.png" alt="Next">
						</button>
						<button class="controlButton repeat" title="Repeat Button">
							<img src="inc/assets/img/icons/repeat.png" alt="Repeat">
						</button>
					</div>
					<div class="playbackBar">
						<span class="progressTime current">0:00</span>
						<div class="progressBar">
							<div class="progressBarBG">
								<div class="progress">
								</div>
							</div>
						</div>
						<span class="progressTime remaining">0:00</span>
						
					</div>
					
				</div>
				
			</div>
			<div id="nowPlayingRight">
				
			</div>
			
		</div>
		
	</div>

</body>
</html>