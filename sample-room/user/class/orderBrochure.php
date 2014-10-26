<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php"); 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/db-settings.php");

	$fname = isset($_POST['brochureInfo']['fname']) ? $_POST['brochureInfo']['fname'] : ' ';
	$lname = isset($_POST['brochureInfo']['lname']) ? $_POST['brochureInfo']['lname'] : ' ';
	$email = isset($_POST['brochureInfo']['email']) ? $_POST['brochureInfo']['email'] : ' ';
	$tel = isset($_POST['brochureInfo']['tel']) ? $_POST['brochureInfo']['tel'] : ' ';
	$address1 = isset($_POST['brochureInfo']['address1']) ? $_POST['brochureInfo']['address1'] : ' ';
	$address2 = isset($_POST['brochureInfo']['address2']) ? $_POST['brochureInfo']['address2'] : ' ';
	$city = isset($_POST['brochureInfo']['city']) ? $_POST['brochureInfo']['city'] : ' ';
	$state = isset($_POST['brochureInfo']['state']) ? $_POST['brochureInfo']['state'] : ' ';
	$zip = isset($_POST['brochureInfo']['zip']) ? $_POST['brochureInfo']['zip'] : ' ';
	$instructions = isset($_POST['brochureInfo']['instructions']) ? $_POST['brochureInfo']['instructions'] : ' ';

	$to      = '09egrego@gmail.com';

	$subject = 'Brochure Order Alert';

	$message = 	'<html>
					<head>
					  <title>Zolatone Brochure Order</title>
					</head>
					<body>
						<h1>Zolatone Brochure Order</h1>

						<fieldset>
							<legend>Special Instructions:</legend>
							<p>' . $instructions . '</p>
						</fieldset>

						<h3>Shipping Address:</h3>
						' . $fname . " " . $lname . '<br />
						' . $address1 . '<br />
						' . $address2 . '<br />
						' . $city . ", " . $state . " " . $zip . '<br /><br />
						Phone: ' . $tel . '</p>
					</body>
				</html>';

		$headers = 'MIME-Version: 1.0' . "\r\n" .
			'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
			'From:' . 'noreply@zolatone.com' . "\r\n" .
		    'Reply-To:' . 'noreply@zolatone.com' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers);

	echo 'success';

?>