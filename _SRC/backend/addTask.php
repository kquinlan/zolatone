<?php
session_start();

require_once 'db.php'; // The mysql database connection script

function guid(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    } else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12);
        return $uuid;
    }
}

$user_id = $_SESSION['user_id'];
$boardToken = guid();
$name = mysql_real_escape_string($_POST['board']['name']);
$description = mysql_real_escape_string($_POST['board']['description']);
$samples = "[233,344,222,112]";
 
$query="INSERT INTO boards(user_id, boardToken, name, description) VALUES ('$user_id', '$boardToken', '$name', '$description')";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$result = $mysqli->affected_rows;
 
echo $json_response = json_encode($result);

?>