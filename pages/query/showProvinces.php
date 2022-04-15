<?php 
require_once('connect.php');

$sql = "SELECT id,code,name_in_thai FROM `provinces`";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  $rows['provincesObj'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
}else{
  $rows['provincesObj'] = null;
}
print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>