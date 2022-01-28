<?php 
require('connect.php');
$id = $_GET['id'];

$checkFile = "SELECT documentName FROM `documents` WHERE userId = '$id'";
$resultCheck = mysqli_query($conn,$checkFile);
if(mysqli_num_rows($resultCheck)>=1){
  while($r = mysqli_fetch_array($resultCheck,MYSQLI_ASSOC)){
     $rows['docObj'][] =$r['documentName'];
  }
}else{
  $rows['docObj'] = null;
}
print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>