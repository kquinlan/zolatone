<?php 
session_start();

require_once 'db.php'; // The mysql database connection script

$user_id = $_SESSION['user_id'];

$query="select * from boards where user_id like '$user_id' order by user_id asc";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$arr[] = $row;	
	}
}

# JSON-encode the response
echo $json_response = json_encode($arr);
?>