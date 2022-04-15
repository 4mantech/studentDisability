<?php 
require_once('connect.php');
if(isset($_GET['provinceId'])){
  $provinceId = $_GET['provinceId'];
  $sql = "SELECT id,code,name_in_thai,province_id FROM `districts` WHERE province_id = '$provinceId'";
}else{
  $sql = "SELECT id,code,name_in_thai,province_id FROM `districts`";
}
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  $rows['districtsObj'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
}else{
  $rows['districtsObj'] = null;
}
print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>