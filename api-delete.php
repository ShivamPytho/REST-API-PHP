<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');   
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Methods,Authorization, X-Requested-With,Content-Type,Access-Control-Allow-Origin');


//php://input = this is key any json data insert level
$data  = json_decode(file_get_contents("php://input"), true);

$id  = $data['id'];

include "config.php";

$sql = "DELETE FROM employe WHERE id = {$id}";

if (mysqli_query($conn , $sql)) {
    echo json_encode(array('message' => 'Data Deleted ' , 'status' => true));

}else{
    echo json_encode(array('message' => 'Not Deleted' , 'status' => false));
}

?>