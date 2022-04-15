<?php 
require_once('connect.php');
if(isset($_GET['districtId'])){
  $districtId = $_GET['districtId'];
  $sql = "SELECT id,code,name_in_thai,district_id,zip_code FROM `subdistricts` WHERE district_id = '$districtId'";
}else{
  $sql = "SELECT id,code,name_in_thai,district_id,zip_code FROM `subdistricts`";
}
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  $rows['subDistrictsObj'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
}else{
  $rows['subDistrictsObj'] = null;
}
print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>