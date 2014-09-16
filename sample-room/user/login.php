<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php");
	if (!securePage($_SERVER['PHP_SELF'])){ die(); }

	//Prevent the user visiting the logged in page if he/she is already logged in
	if(isUserLoggedIn()) { header("Location: /sample-room/index.php"); die(); }

	//Forms posted
	if(!empty($_POST)) {
		$errors = array();
		$username = sanitize(trim($_POST["username"]));
		$password = trim($_POST["password"]);
		
		//Perform some validation
		if($username == "") {
			$errors[] = lang("ACCOUNT_SPECIFY_USERNAME");
		}
		if($password == "") {
			$errors[] = lang("ACCOUNT_SPECIFY_PASSWORD");
		}

		if(count($errors) == 0) {
			//A security note here, never tell the user which credential was incorrect
			if(!usernameExists($username)) {
				$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
			} else {
				$userdetails = fetchUserDetails($username);
				//See if the user's account is activated
				if($userdetails["active"]==0) {
					$errors[] = lang("ACCOUNT_INACTIVE");
				} else {
					//Hash the password and use the salt from the database to compare the password.
					$entered_pass = generateHash($password,$userdetails["password"]);
					
					if($entered_pass != $userdetails["password"]) {
						//Again, we know the password is at fault here, but lets not give away the combination incase of someone bruteforcing
						$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
					} else {
						//Construct a new logged in user object
						$loggedInUser = new loggedInUser();
						$loggedInUser->email = $userdetails["email"];
						$loggedInUser->user_id = $userdetails["id"];
						$loggedInUser->hash_pw = $userdetails["password"];
						$loggedInUser->title = $userdetails["title"];
						$loggedInUser->displayname = $userdetails["display_name"];
						$loggedInUser->username = $userdetails["user_name"];
						
						//Update last sign in
						$loggedInUser->updateLastSignIn();
						$_SESSION["userCakeUser"] = $loggedInUser;
						
						//Redirect to user account page
						header("Location: /sample-room/index.php");
						die();
					}
				}
			}
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
		<div id="login-form" class="small-11 medium-8 large-6 columns small-centered small-padding-top-4 small-padding-bottom-4">
			<h1 class="color-primary text-center small-margin-bottom-1">Login</h1>

			<div class="small-padding-top-1 small-margin-bottom-1">
				<ul class="text-smaller color-primary">
					<? echo resultBlock($errors,$successes); ?>
				</ul>
			</div>

			<? if(count($successes) > 0) { echo "<div style='display:none'>"; } ?>
			    <form name='newUser' action="#login-form" method='post'>
					<input type='text' maxlength="25" pattern=".{5,25}" required title="Your username must be between 5 and 25 characters in length" placeholder="Username" name='username' />
					<input type='password' maxlength="50" pattern=".{8,50}" required title="Your password must be between 8 and 50 characters in length" placeholder="Password" name='password' />
					<div class="small-12 small-margin-top-1">
						<input class="button" type='submit' value='Login' />
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