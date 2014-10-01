<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php"); 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/db-settings.php");

	if(isUserloggedIn()) {
		function clean($string) {
		   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

		   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
		}

		$user_id = $loggedInUser->user_id;
		$selectedColorCardId = clean($_GET['selectedColorCardId']);
		$fname = clean($_GET['fname']);
		$lname = $_GET['lname'];
		$company = $_GET['company'];
		$tel = $_GET['tel'];
		$address1 = $_GET['address1'];
		$address2 = strval($_GET['address2']);
		$city = $_GET['city'];
		$state = $_GET['state'];
		$zip = $_GET['zip'];
		$instructions = $_GET['instructions'];

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

		$message = 	'<html>
						<head>
						  <title>Birthday Reminders for August</title>
						</head>
						<body>
							<h1>Zolatone Color on Demand Order</h1>
							<p>Color on demand card: ' . $address2 . '</p>
						</body>
					</html>';





		/*'Zolatone Sample Request:' . "\r\n\r\n" .

					'Color On Demand Card: ' . $cardName . "\r\n\r\n" .

					'User: ' . $loggedInUser->username . "\r\n" .
					'Phone: ' . $tel . "\r\n" .
					'Email: ' . $loggedInUser->email . "\r\n\r\n" .

					'Shipping Address:' . "\r\n" .
					$company . "\r\n" .
					'Attn: ' . $fname . " " . $lname . "\r\n" .
					$address1 . "\r\n" .
					$address2 . "\r\n" .
					$city . ' , ' . $state . " " . $zip . "\r\n\r\n" .

					'Special Instructions: ' . "\r\n" .
					$instructions . "\r\n\r\n" .

					'Samples on this color card:' . "\r\n" .
					$samplesList;*/

		$headers = 'MIME-Version: 1.0' . "\r\n" .
			'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
			'From:' . $loggedInUser->email . "\r\n" .
		    'Reply-To:' . $loggedInUser->email . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);

	} 

	else {
		echo "You are not logged in";
	}

	
?>