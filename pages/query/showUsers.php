<?php 
require('connect.php');
$sql = "SELECT * FROM users ORDER BY role ASC";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>=1){
  while($r = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $rows['usersObj'][] =$r;
  }
}else{
  $rows['usersObj']= null;
}
print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>