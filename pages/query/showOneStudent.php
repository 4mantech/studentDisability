<?php 
require('connect.php');
$id = $_GET['id'];
$sql = "SELECT u.id,userName,prefix,firstName,lastName,u.role,phone,idCardNumber,idCodeAcdemy,birthDate,
nickName,departmentId,address,imageProfilePath,subDistrict,district,province,
postalCode,disabilityId,disabilityType,yearOfEdu,facultyId FROM users u 
INNER JOIN studentdetail s ON u.id = s.userId
INNER JOIN departments d ON s.departmentId = d.id
INNER JOIN faculties f ON f.id = d.facultyId
WHERE u.id = '$id'";

$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1){
  $r = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $row['studentObj'][] = $r;
}else{
  $row['studentObj'] =null;
}
print json_encode($row,JSON_UNESCAPED_UNICODE);
?>