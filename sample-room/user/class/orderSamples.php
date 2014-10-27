<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php"); 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/db-settings.php");

	if(isUserloggedIn()) {

		$user_id = $loggedInUser->user_id;

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
		$samplesList = ($_POST['orderInfo']['orderedColors']);

		$samplesList = implode("<br />", $samplesList);

		$to      = 'samples@mastercoating.com';

		$subject = 'Color on Demand Order Alert';

		$message = 	'<html>
						<head>
						  <title>Zolatone 4X5 Samples Order</title>
						</head>
						<body>
							<h1>Zolatone 4X5 Samples Order</h1>
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

							<h3>Samples ordered:</h3>
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