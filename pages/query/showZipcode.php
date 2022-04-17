<?php
$subDistrictId = $_GET['subDistrictId'];
require('connect.php');

$sql = "SELECT zip_code FROM subdistricts WHERE id = '$subDistrictId'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1){
  $r = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $row['zipCodeObj'] = $r;
}else{
  $row['zipCodeObj'] =null;
}
print json_encode($row,JSON_UNESCAPED_UNICODE);
?>