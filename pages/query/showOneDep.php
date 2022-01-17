<?php 
require('connect.php');

$facId = $_GET['facId'];
$depId = $_GET['depId'];

$sql = "SELECT * FROM departments WHERE facultyId = '$facId' AND id = '$depId'";

$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1){
  $r = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $row['depObj'][] = $r;
}else{
  $row['depObj'] =null;
}
print json_encode($row,JSON_UNESCAPED_UNICODE);
?>