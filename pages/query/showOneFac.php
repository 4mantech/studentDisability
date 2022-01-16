<?php 
require('connect.php');
$id = $_GET['id'];
$sql = "SELECT * FROM faculties WHERE id = '$id'";

$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1){
  $r = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $row['facObj'][] = $r;
}else{
  $row['facObj'] =null;
}
print json_encode($row,JSON_UNESCAPED_UNICODE);
?>