<?php 
$username = "root";
$password = "afif";
$database = "signzy";

$fname = "";
$lname = "";

if(isset($_REQUEST['fname'])) $fname = $_REQUEST['fname'];
if(isset($_REQUEST['lname'])) $lname = $_REQUEST['lname'];



if(strlen($fname)>=3 && strlen($lname)>=3){
	$query = "SELECT * from all_names where fname like '%$fname%' AND lname like '%$lname%' limit 5";
}
// echo $fname.PHP_EOL;
// echo $lname.PHP_EOL;
else if(strlen($fname)>=3)
{
	$query = "SELECT * from all_names where fname like '%$fname%' limit 5";
}
else if(strlen($lname)>=3)
{
	$query="SELECT * from all_names where lname like '%$lname%' ";
}

//echo $query.PHP_EOL;
// $query = "SELECT * from all_names WHERE fname LIKE '%Ind%' limit 5";
if(is_null($query)){
	echoJSON(array("Response" => "Invalid parameters received."));
} else {
	$con = mysqli_connect('localhost',$username,$password,$database) or die( "Unable to select database");
	mysqli_set_charset($con, "utf8");
	$response = array();

	$result = mysqli_query($con, $query);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		array_push($response, $row);
	}
	echoJSON(array('data' => $response));
}


function echoJSON($array) {
	header('Content-type: Application/json; charset=UTF-8');
	echo json_encode($array, JSON_PRETTY_PRINT);
}

mysqli_close($con);
?>




