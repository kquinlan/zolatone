<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php"); 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/db-settings.php");

	if(isUserloggedIn()) {
		$user_id = $loggedInUser->user_id;

		$query = "select saved_samples from zol_users where id like '$user_id'";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

		$arr = array();
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$arr[] = $row;	
			}
		}

		$samples = explode(',' , $arr[0]['saved_samples']);
		$arr = array();
		foreach ($samples as $sample) {
			$query = "select name from zol_samples where id like '$sample'";
			$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

			if($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$arr[] = $row;	
				}
			}
		}

		$i = 0;
		$samplesList = array();
		foreach ($arr as $fetchedSample) {
			$samplesList[$i] = $fetchedSample['name'];
			$i++;
		}



		$samplesList = implode("\n", $samplesList);

		$to      = '09egrego@gmail.com';
		$subject = 'Color on Demand Request';
		$message = $samplesList;
		$headers = 'From:' . $loggedInUser->email . "\r\n" .
		    'Reply-To:' . $loggedInUser->email . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);

		echo $json_response = json_encode($arr);

	} 

	else {
		echo "You are not logged in";
	}

	
?>