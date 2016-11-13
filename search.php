<?php 
$username = "root";
$password = "afif";
$database = "signzy";

$con = mysqli_connect('localhost',$username,$password,$database) or die( "Unable to select database");
$response = array();

$query = "SELECT * from all_names limit 5";

$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	array_push($response, $row);
}


echoJSON(array('data' => $response));

function echoJSON($array) {
	header('Content-type: Application/json');
	echo json_encode($array, JSON_PRETTY_PRINT);
}

mysqli_close();
?>




