<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$data  = json_decode(file_get_contents("php://input"), true);

$name  = $data['id'];

include "config.php";

$sql = "SELECT * From employe WHERE id = {$name}";
$result  = mysqli_query($conn , $sql) or die("SQL query failed");
if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(array('message' => 'No recode found' , 'status' => false));
}

?>