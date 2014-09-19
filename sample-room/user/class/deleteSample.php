<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php"); 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/db-settings.php");
	
	if(isUserloggedIn()) {
		$user_id = $loggedInUser->user_id;
		$color = $_GET['color'];

		$query = "SELECT saved_samples FROM zol_users WHERE id LIKE '$user_id'";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

		$arr = array();
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$arr[] = $row;	
			}
		}

		# Add the selected sample to the user's saved string
		$savedSamples = $arr[0]['saved_samples'];

		$obj = explode(',', $savedSamples);
		unset($obj[array_search($color, $obj)]);
		$savedSamples = implode(",", $obj);

		$query = "UPDATE zol_users SET saved_samples = '$savedSamples' WHERE id = '$user_id'";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	} 

	else {
		echo "You are not logged in";
	}

?>