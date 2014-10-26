<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php");
	if (!securePage($_SERVER['PHP_SELF'])){ die(); }

	//Log the user out
	if(isUserLoggedIn()) {
		$loggedInUser->userLogOut();
	}

	header("Location: /");	
?>

