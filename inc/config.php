<?php
	ob_start();
	$timeZone = date_default_timezone_set("America/New_York");
	$con = mysqli_connect("localhost", "root", "root", "slotify");
	if (mysqli_connect_errno()) {
		echo "Failed to connect:" . mysqli_connect_errno();
	}


?>