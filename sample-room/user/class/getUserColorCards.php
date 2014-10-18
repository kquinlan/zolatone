<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php"); 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/db-settings.php");

	if(isUserloggedIn()) {
		$user_id = $loggedInUser->user_id;

		$query = "select * from zol_boards where user_id like '$user_id'";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

		$boards = array();
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$boards[] = $row;	
			}
		}

		# JSON-encode the response
		echo $json_response = json_encode($boards);

	} 

	else {
		echo "You are not logged in";
	}
	
?>