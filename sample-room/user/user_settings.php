<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php");
	if (!securePage($_SERVER['PHP_SELF'])){die();}

	//Prevent the user visiting the logged in page if he is not logged in
	if(!isUserLoggedIn()) { header("Location: login.php"); die(); }

	if(!empty($_POST))
	{
		$errors = array();
		$successes = array();
		$password = $_POST["password"];
		$password_new = $_POST["passwordc"];
		$password_confirm = $_POST["passwordcheck"];
		
		$errors = array();
		$email = $_POST["email"];
		
		//Perform some validation
		//Feel free to edit / change as required
		
		//Confirm the hashes match before updating a users password
		$entered_pass = generateHash($password,$loggedInUser->hash_pw);
		
		if (trim($password) == ""){
			$errors[] = lang("ACCOUNT_SPECIFY_PASSWORD");
		}
		else if($entered_pass != $loggedInUser->hash_pw)
		{
			//No match
			$errors[] = lang("ACCOUNT_PASSWORD_INVALID");
		}	
		if($email != $loggedInUser->email)
		{
			if(trim($email) == "")
			{
				$errors[] = lang("ACCOUNT_SPECIFY_EMAIL");
			}
			else if(!isValidEmail($email))
			{
				$errors[] = lang("ACCOUNT_INVALID_EMAIL");
			}
			else if(emailExists($email))
			{
				$errors[] = lang("ACCOUNT_EMAIL_IN_USE", array($email));	
			}
			
			//End data validation
			if(count($errors) == 0)
			{
				$loggedInUser->updateEmail($email);
				$successes[] = lang("ACCOUNT_EMAIL_UPDATED");
			}
		}
		
		if ($password_new != "" OR $password_confirm != "")
		{
			if(trim($password_new) == "")
			{
				$errors[] = lang("ACCOUNT_SPECIFY_NEW_PASSWORD");
			}
			else if(trim($password_confirm) == "")
			{
				$errors[] = lang("ACCOUNT_SPECIFY_CONFIRM_PASSWORD");
			}
			else if(minMaxRange(8,50,$password_new))
			{	
				$errors[] = lang("ACCOUNT_NEW_PASSWORD_LENGTH",array(8,50));
			}
			else if($password_new != $password_confirm)
			{
				$errors[] = lang("ACCOUNT_PASS_MISMATCH");
			}
			
			//End data validation
			if(count($errors) == 0)
			{
				//Also prevent updating if someone attempts to update with the same password
				$entered_pass_new = generateHash($password_new,$loggedInUser->hash_pw);
				
				if($entered_pass_new == $loggedInUser->hash_pw)
				{
					//Don't update, this fool is trying to update with the same password Â¬Â¬
					$errors[] = lang("ACCOUNT_PASSWORD_NOTHING_TO_UPDATE");
				}
				else
				{
					//This function will create the new hash and update the hash_pw property.
					$loggedInUser->updatePassword($password_new);
					$successes[] = lang("ACCOUNT_PASSWORD_UPDATED");
				}
			}
		}
		if(count($errors) == 0 AND count($successes) == 0){
			$errors[] = lang("NOTHING_TO_UPDATE");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <title>Zolatone | User Account Settings</title>
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
			<h1 class="color-primary text-center small-margin-bottom-1">Your Account Settings</h1>

			<div class="small-padding-top-1 small-margin-bottom-1">
				<ul class="text-smaller color-primary">
					<? echo resultBlock($errors,$successes); ?>
				</ul>
			</div>

			<? if(count($successes) > 0) { echo "<div style='display:none'>"; } ?>
			    <form name='newUser' action="#register-form" method='post'>
					<input type='password' maxlength="50" pattern=".{8,50}" required title="Your password must be between 8 and 50 characters in length" placeholder="Password" name='password' />
					<input type='email' maxlength="50" placeholder="Email" required name='email' value=<? echo $loggedInUser->email ?> />
					<input type='password' maxlength="50" pattern=".{8,50}" required title="Your password must be between 8 and 50 characters in length" placeholder="New Password" name='passwordc' />
					<input type='password' maxlength="50" pattern=".{8,50}" required title="Your password name must be between 8 and 50 characters in length" placeholder="Confirm Password" name='passwordcheck' />
					<div class="small-12 small-margin-top-1">
						<input class="button small" type='submit' value='Update' />
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