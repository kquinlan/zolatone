<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <title>Zolatone | Forgot Password</title>
        <link rel="stylesheet" href="/css/app.css" />
        <link rel="stylesheet" href="/css/foundation.css" />
    </head>

	<?php
		require_once("models/config.php");
		if (!securePage($_SERVER['PHP_SELF'])){die();}

		//User has confirmed they want their password changed 
		if(!empty($_GET["confirm"]))
		{
			$token = trim($_GET["confirm"]);
			
			if($token == "" || !validateActivationToken($token,TRUE))
			{
				$errors[] = lang("FORGOTPASS_INVALID_TOKEN");
			}
			else
			{
				$rand_pass = getUniqueCode(15); //Get unique code
				$secure_pass = generateHash($rand_pass); //Generate random hash
				$userdetails = fetchUserDetails(NULL,$token); //Fetchs user details
				$mail = new userCakeMail();		
				
				//Setup our custom hooks
				$hooks = array(
					"searchStrs" => array("#GENERATED-PASS#","#USERNAME#"),
					"subjectStrs" => array($rand_pass,$userdetails["display_name"])
					);
				
				if(!$mail->newTemplateMsg("your-lost-password.txt",$hooks))
				{
					$errors[] = lang("MAIL_TEMPLATE_BUILD_ERROR");
				}
				else
				{	
					if(!$mail->sendMail($userdetails["email"],"Your new password"))
					{
						$errors[] = lang("MAIL_ERROR");
					}
					else
					{
						if(!updatePasswordFromToken($secure_pass,$token))
						{
							$errors[] = lang("SQL_ERROR");
						}
						else
						{	
							if(!flagLostPasswordRequest($userdetails["user_name"],0))
							{
								$errors[] = lang("SQL_ERROR");
							}
							else {
								$successes[]  = lang("FORGOTPASS_NEW_PASS_EMAIL");
							}
						}
					}
				}
			}
		}

		//User has denied this request
		if(!empty($_GET["deny"]))
		{
			$token = trim($_GET["deny"]);
			
			if($token == "" || !validateActivationToken($token,TRUE))
			{
				$errors[] = lang("FORGOTPASS_INVALID_TOKEN");
			}
			else
			{
				
				$userdetails = fetchUserDetails(NULL,$token);
				
				if(!flagLostPasswordRequest($userdetails["user_name"],0))
				{
					$errors[] = lang("SQL_ERROR");
				}
				else {
					$successes[] = lang("FORGOTPASS_REQUEST_CANNED");
				}
			}
		}

		//Forms posted
		if(!empty($_POST))
		{
			$email = $_POST["email"];
			$username = sanitize($_POST["username"]);
			
			//Perform some validation
			//Feel free to edit / change as required
			
			if(trim($email) == "")
			{
				$errors[] = lang("ACCOUNT_SPECIFY_EMAIL");
			}
			//Check to ensure email is in the correct format / in the db
			else if(!isValidEmail($email) || !emailExists($email))
			{
				$errors[] = lang("ACCOUNT_INVALID_EMAIL");
			}
			
			if(trim($username) == "")
			{
				$errors[] = lang("ACCOUNT_SPECIFY_USERNAME");
			}
			else if(!usernameExists($username))
			{
				$errors[] = lang("ACCOUNT_INVALID_USERNAME");
			}
			
			if(count($errors) == 0)
			{
				
				//Check that the username / email are associated to the same account
				if(!emailUsernameLinked($email,$username))
				{
					$errors[] =  lang("ACCOUNT_USER_OR_EMAIL_INVALID");
				}
				else
				{
					//Check if the user has any outstanding lost password requests
					$userdetails = fetchUserDetails($username);
					if($userdetails["lost_password_request"] == 1)
					{
						$errors[] = lang("FORGOTPASS_REQUEST_EXISTS");
					}
					else
					{
						//Email the user asking to confirm this change password request
						//We can use the template builder here
						
						//We use the activation token again for the url key it gets regenerated everytime it's used.
						
						$mail = new userCakeMail();
						$confirm_url = lang("CONFIRM")."\n".$websiteUrl."forgot-password.php?confirm=".$userdetails["activation_token"];
						$deny_url = lang("DENY")."\n".$websiteUrl."forgot-password.php?deny=".$userdetails["activation_token"];
						
						//Setup our custom hooks
						$hooks = array(
							"searchStrs" => array("#CONFIRM-URL#","#DENY-URL#","#USERNAME#"),
							"subjectStrs" => array($confirm_url,$deny_url,$userdetails["user_name"])
							);
						
						if(!$mail->newTemplateMsg("lost-password-request.txt",$hooks))
						{
							$errors[] = lang("MAIL_TEMPLATE_BUILD_ERROR");
						}
						else
						{
							if(!$mail->sendMail($userdetails["email"],"Lost password request"))
							{
								$errors[] = lang("MAIL_ERROR");
							}
							else
							{
								//Update the DB to show this account has an outstanding request
								if(!flagLostPasswordRequest($userdetails["user_name"],1))
								{
									$errors[] = lang("SQL_ERROR");
								}
								else {
									
									$successes[] = lang("FORGOTPASS_REQUEST_SUCCESS");
								}
							}
						}
					}
				}
			}
		}
	?>

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

		<!-- Forgot Password -->
		<div id="forgot-pw-form" class="small-11 medium-8 large-6 columns small-centered small-padding-top-4 small-padding-bottom-4">
			<h1 class="color-primary text-center small-margin-bottom-1">Forgot Password</h1>

			<div class="register-errors small-padding-top-1 small-margin-bottom-1">
				<ul class="text-smaller color-primary">
					<? echo resultBlock($errors,$successes); ?>
				</ul>
			</div>

			<? if(count($successes) > 0) { echo "<div style='display:none'>"; } ?>
			    <form name='newUser' action="#forgot-pw-form" method='post'>
					<input type='text' maxlength="25" pattern=".{5,25}" required title="Your username must be between 5 and 25 characters in length" placeholder="Username" name='username' />
					<input type='email' maxlength="50" placeholder="Email" required name='email' />
					<div class="small-12 small-margin-top-1">
						<input class="button" type='submit' value='Submit' />
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