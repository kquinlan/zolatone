<?php
	session_start();
	$md5_hash = md5(rand(0,99999)); 
	$security_code = substr($md5_hash, 25, 5); 
	$enc = md5($security_code);
	$_SESSION['captcha'] = $enc;

	$width = 100;
	$height = 30; 

	$image = ImageCreate($width, $height);  
	$white = ImageColorAllocate($image, 255, 255, 255);
	$grey = ImageColorAllocate($image, 200, 200, 200);

	ImageFill($image, 0, 0, $white); 
	ImageString($image, 10, 10, 7, $security_code, $grey); 

	header("Content-Type: image/png"); 
	ImagePng($image);
	ImageDestroy($image);
?>
