<?php

// header('Content-Type: application/json');
// header('Access-Control-Allow-Origin: *');

// //php://input = this is key any json data insert level
// $data  = json_decode(file_get_contents("php://input"), true);

// $search_value = $data['search'];

// // $search_value = isset($_GET['search']) ? $_GET['search'] : die();

// include "config.php";

// $sql = "SELECT * From employe WHERE id LIKE '%{$search_value}%'";

// $result  = mysqli_query($conn , $sql) or die("SQL query failed");
// if (mysqli_num_rows($result) > 0) {
//     $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
//     echo json_encode($output);
// }else{
//     echo json_encode(array('message' => 'Search recard not found' , 'status' => false));
// }




header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

/*$data = json_decode(file_get_contents("php://input"), true);
$search_value = $data['search'];*/

$search_value = isset($_GET['search']) ? $_GET['search'] : die();

include "config.php";

$sql = "SELECT * FROM employe WHERE id   LIKE '%{$search_value}%'";

$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

if(mysqli_num_rows($result) > 0 ){
	
	$output = mysqli_fetch_all($result, MYSQLI_ASSOC);
	echo json_encode($output);

}else{

 echo json_encode(array('message' => 'No Search Found.', 'status' => false));

}  


?>