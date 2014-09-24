<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php"); 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/db-settings.php");
	
	if(isUserloggedIn()) {
		$user_id = $loggedInUser->user_id;
		$colorCardName = mysql_real_escape_string($_GET['colorCardName']);
		$colorCardColors = $_GET['colorCardColors'];

		if($colorCardName != undefined) {
			$query = "INSERT INTO zol_boards (user_id, name, saved_samples) VALUES ('$user_id', '$colorCardName', '$colorCardColors')";
			$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		}

	} 

	else {
		echo "You are not logged in";
	}

?>