<?php 
$id = $_GET['id'];
require('connect.php');
$sql = "DELETE FROM departments WHERE id = '$id'";
if($result = mysqli_query($conn,$sql)){
 echo $result;
}
?>