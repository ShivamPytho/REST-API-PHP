<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');   
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Methods,Authorization, X-Requested-With,Content-Type,Access-Control-Allow-Origin');

//php://input = this is key any json data insert level
$data  = json_decode(file_get_contents("php://input"), true);

$name  = $data['name'];
$digestion  = $data['digestion'];
$salary  = $data['salary'];

include "config.php";

$sql = "INSERT INTO employe(name,digestion,salary)  VALUE('{$name}', '{$digestion}',  '{$salary}')";

if (mysqli_query($conn , $sql)) {
    echo json_encode(array('message' => 'Data Insert ' , 'status' => true));

}else{
    echo json_encode(array('message' => 'Not Insert' , 'status' => false));
}

?>