<?php 
require('connect.php');
$id = $_POST['id'];
$password = $_POST['password'];

$key = "adisak_meetongCPE61346RMUTT,DSSRMUTT";
$hash_login_password = hash_hmac('sha256',$password,$key);

$sql = "UPDATE `users` SET `password`='$hash_login_password' WHERE id = '$id'";
if(mysqli_query($conn,$sql)){
  echo "true";
}else{
  echo "false";
}
mysqli_close($conn);
?>