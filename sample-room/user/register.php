<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php");
	if (!securePage($_SERVER['PHP_SELF'])){ die(); }

	//Prevent the user visiting the logged in page if he/she is already logged in
	if(isUserLoggedIn()) { header("Location: /sample-room/index.php"); die(); }

	//Forms posted
	if(!empty($_POST)) {
		$errors = array();
		$email = trim($_POST["email"]);
		$username = trim($_POST["username"]);
		$displayname = trim($_POST["displayname"]);
		$password = trim($_POST["password"]);
		$confirm_pass = trim($_POST["passwordc"]);
		$captcha = md5($_POST["captcha"]);
		
		
		if ($captcha != $_SESSION['captcha']) {
			$errors[] = lang("CAPTCHA_FAIL");
		}
		if(minMaxRange(5,25,$username)) {
			$errors[] = lang("ACCOUNT_USER_CHAR_LIMIT",array(5,25));
		}
		if(!ctype_alnum($username)) {
			$errors[] = lang("ACCOUNT_USER_INVALID_CHARACTERS");
		}
		if(minMaxRange(5,25,$displayname)) {
			$errors[] = lang("ACCOUNT_DISPLAY_CHAR_LIMIT",array(5,25));
		}
		if(minMaxRange(8,50,$password) && minMaxRange(8,50,$confirm_pass)) {
			$errors[] = lang("ACCOUNT_PASS_CHAR_LIMIT",array(8,50));
		}
		else if($password != $confirm_pass) {
			$errors[] = lang("ACCOUNT_PASS_MISMATCH");
		}
		if(!isValidEmail($email)) {
			$errors[] = lang("ACCOUNT_INVALID_EMAIL");
		}
		//End data validation
		if(count($errors) == 0) {	
			//Construct a user object
			$user = new User($username,$displayname,$password,$email);
			
			//Checking this flag tells us whether there were any errors such as possible data duplication occured
			if(!$user->status) {
				if($user->username_taken) $errors[] = lang("ACCOUNT_USERNAME_IN_USE",array($username));
				if($user->displayname_taken) $errors[] = lang("ACCOUNT_DISPLAYNAME_IN_USE",array($displayname));
				if($user->email_taken) 	  $errors[] = lang("ACCOUNT_EMAIL_IN_USE",array($email));		
			} else {
				//Attempt to add the user to the database, carry out finishing  tasks like emailing the user (if required)
				if(!$user->userCakeAddUser()) {
					if($user->mail_failure) $errors[] = lang("MAIL_ERROR");
					if($user->sql_failure)  $errors[] = lang("SQL_ERROR");
				}
			}

		$successes[] = $user->success;

		}
		
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <title>Zolatone | Register</title>
        <link rel="stylesheet" href="/css/app.css" />
        <link rel="stylesheet" href="/css/foundation.css" />
    </head>

	<body>

		<? require_once ($_SERVER['DOCUMENT_ROOT'] . '/common/header.php') ?>

        <div class="slider-container">
            <section class="content">
                <div class="text-center">
                    <h2 class="color-white"><b>The most distinctive high<br />performance coatings available.</b></h2>
                </div>
            </section>

            <? require_once ($_SERVER['DOCUMENT_ROOT'] . '/common/slider.php') ?>
        </div>

		<!-- Register -->
		<div id="register-form" class="small-11 medium-8 large-6 columns small-centered small-padding-top-4 small-padding-bottom-4">
			<h1 class="color-primary text-center small-margin-bottom-1">Sign Up</h1>

			<div class="small-padding-top-1 small-margin-bottom-1">
				<ul class="text-smaller color-primary">
					<? echo resultBlock($errors,$successes); ?>
				</ul>
			</div>

			<? if(count($successes) > 0) { echo "<div style='display:none'>"; } ?>
			    <form name='newUser' action="#register-form" method='post'>
					<input type='text' maxlength="25" pattern=".{5,25}" required title="Your username must be between 5 and 25 characters in length" placeholder="Username" name='username' />
					<input type='text' maxlength="25" pattern=".{5,25}" required title="Your display name must be between 5 and 25 characters in length" placeholder="Full Name" name='displayname' />
					<input type='password' maxlength="50" pattern=".{8,50}" required title="Your password must be between 8 and 50 characters in length" placeholder="Password" name='password' />
					<input type='password' maxlength="50" pattern=".{8,50}" required title="Your password must be between 8 and 50 characters in length" placeholder="Confirm Password" name='passwordc' />
					<input type='email' maxlength="50" placeholder="Email" required name='email' />
					<input name='captcha' maxlength="5" placeholder="Enter Text Shown Below" required type='text'>
					<img src='/sample-room/user/models/captcha.php'>
					<div class="small-12 small-margin-top-1">
						<input class="button" type='submit' value='Sign Up' />
					</div>
				</form>
			<? if(count($successes) > 0) { echo "</div>"; } ?>

		</div>

		<? require_once ($_SERVER['DOCUMENT_ROOT'] . '/common/footer.php') ?>

		<script src="/js/vendor/jquery.js"></script>
        <script src="/js/transit.min.js"></script>
        <script src="/js/foundation.min.js"></script>
        <script src="/js/vendor/fastclick.js"></script>
        <script src="/js/responsiveslides.min.js"></script>
        <script src="/js/app.js"></script>
	</body>
</html>