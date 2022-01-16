<?php 
$id = $_GET['id'];
require('connect.php');
$sql = "DELETE FROM faculties WHERE id = '99'";
if($result = mysqli_query($conn,$sql)){
 echo $result;
}
?>