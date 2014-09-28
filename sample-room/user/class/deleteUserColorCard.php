<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php"); 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/db-settings.php");

	if(isUserloggedIn()) {
		$user_id = $loggedInUser->user_id;
		$selectedColorCardId = $_GET['selectedColorCardId'];

		$query = "delete from zol_boards where id like '$selectedColorCardId'";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	} 

	else {
		echo "You are not logged in";
	}

	
?>