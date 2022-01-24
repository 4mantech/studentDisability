<?php 
require('connect.php');
$id = $_POST['id'];
$sql = "DELETE FROM `users` WHERE id = '$id'";

if(mysqli_query($conn,$sql)){
  echo json_encode(array("status"=>"true"));
}else{
  echo json_encode(array("status"=>"false"));
}

mysqli_close($conn);
?>