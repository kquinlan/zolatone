<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php"); 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/db-settings.php");
	
	if(isUserloggedIn()) {
		$user_id = $loggedInUser->user_id;
		$colorCardName = mysql_escape_string ($_POST['newColorCard']['colorCardName']);
		$colorCardColors = implode(',', $_POST['newColorCard']['selectedColors']);
		$date = date("F jS Y h:i A");

		$query = "INSERT INTO zol_boards (user_id, name, date_created, saved_samples) VALUES ('$user_id', '$colorCardName', '$date', '$colorCardColors')";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	} 

	else {
		echo "You are not logged in";
	}

?>