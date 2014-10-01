<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php"); 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/db-settings.php");

	if(isUserloggedIn()) {
		$user_id = $loggedInUser->user_id;
		$selectedColorCardId = $_GET['selectedColorCardId'];
		$fname = $_GET['fname'];
		$fname = $_GET['lname'];
		$fname = $_GET['company'];
		$fname = $_GET['tel'];
		$fname = $_GET['address1'];
		$fname = $_GET['address2'];
		$fname = $_GET['city'];
		$fname = $_GET['state'];
		$fname = $_GET['zip'];
		$fname = $_GET['instructions'];

		$query = "select saved_samples, name from zol_boards where id like '$selectedColorCardId'";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

		$arr = array();
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$arr[] = $row;	
			}
		}

		$cardName = $arr[0]['name'];

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

		$subject = 'Color on Demand Order Alert';

		$message = 	'Zolatone Sample Request:' . "\r\n\r\n" .
					'Color On Demand Card: ' . $cardName . "\r\n\r\n" .
					'User: ' . $loggedInUser->username . "\r\n" .
					'Phone: ' . "\r\n" .
					'Email: ' . $loggedInUser->email . "\r\n\r\n" .
					'Shipping Address:' . "\r\n" .
					$fname . "\r\n" .
					'Samples on this color card:' . "\r\n" .
					$samplesList;

		$headers = 'From:' . $loggedInUser->email . "\r\n" .
		    'Reply-To:' . $loggedInUser->email . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);

	} 

	else {
		echo "You are not logged in";
	}

	
?>