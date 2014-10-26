<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php"); 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/db-settings.php");

	if(isUserloggedIn()) {

		$user_id = $loggedInUser->user_id;

		$selectedColorCardId = $_POST['orderInfo']['selectedColorCardId'];
		$fname = isset($_POST['orderInfo']['fname']) ? $_POST['orderInfo']['fname'] : ' ';
		$lname = isset($_POST['orderInfo']['lname']) ? $_POST['orderInfo']['lname'] : ' ';
		$company = isset($_POST['orderInfo']['company']) ? $_POST['orderInfo']['company'] : ' ';
		$tel = isset($_POST['orderInfo']['tel']) ? $_POST['orderInfo']['tel'] : ' ';
		$address1 = isset($_POST['orderInfo']['address1']) ? $_POST['orderInfo']['address1'] : ' ';
		$address2 = isset($_POST['orderInfo']['address2']) ? $_POST['orderInfo']['address2'] : ' ';
		$city = isset($_POST['orderInfo']['city']) ? $_POST['orderInfo']['city'] : ' ';
		$state = isset($_POST['orderInfo']['state']) ? $_POST['orderInfo']['state'] : ' ';
		$zip = isset($_POST['orderInfo']['zip']) ? $_POST['orderInfo']['zip'] : ' ';
		$instructions = isset($_POST['orderInfo']['instructions']) ? $_POST['orderInfo']['instructions'] : ' ';

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

		$samplesList = implode("<br />", $samplesList);

		$to      = '09egrego@gmail.com';

		$subject = 'Color on Demand Order Alert';

		$message = 	'<html>
						<head>
						  <title>Zolatone Color on Demand Order</title>
						</head>
						<body>
							<h1>Zolatone Color on Demand Order</h1>
							<h3>Color on demand card: ' . $cardName . '</h3>
							User: ' . $loggedInUser->username . '<br />
							Phone: ' . $tel . '<br />
							Email: ' . $loggedInUser->email . '</p><br /><br />

							<fieldset>
								<legend>Special Instructions:</legend>
								<p>' . $instructions . '</p>
							</fieldset>

							<h3>Shipping Address:</h3>
							<p>' . $company . '<br />
							Attn: ' . $fname . " " . $lname . '<br />
							' . $address1 . '<br />
							' . $address2 . '<br />
							' . $city . ", " . $state . " " . $zip . '</p>

							<h3>Samples on this card:</h3>
							<p>' . $samplesList . '</p>
						</body>
					</html>';

		$headers = 'MIME-Version: 1.0' . "\r\n" .
			'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
			'From:' . 'noreply@zolatone.com' . "\r\n" .
		    'Reply-To:' . 'noreply@zolatone.com' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);

	} 

	else {
		echo "You are not logged in";
	}

	
?>