<?php 
require('connect.php');
$fac = $_GET['fac'];
$dep = $_GET['dep'];
$sql = "";
if($fac == 0 && $dep ==0){
  $sql = "SELECT
  u.id,
  u.userName,
  u.phone,
  u.firstName,
  u.lastName,
  f.id AS facId,
  f.facultyName,
  s.departmentId AS depId,
  s.disabilityType,
  d.departmentName
FROM
  users u
  INNER JOIN studentdetail s
  ON u.id = s.userId
  INNER JOIN departments d
  ON s.departmentId = d.id
  INNER JOIN faculties f
  ON f.id = d.facultyId AND
  u.role = '2'
ORDER BY
  u.id ASC";
}elseif($fac != 0 && $dep ==0 ){
  $sql = "SELECT
  u.id,
  u.userName,
  u.phone,
  u.firstName,
  u.lastName,
  f.id AS facId,
  f.facultyName,
  s.departmentId AS depId,
  s.disabilityType,
  d.departmentName
FROM
  users u
  INNER JOIN studentdetail s
  ON u.id = s.userId
  INNER JOIN departments d
  ON s.departmentId = d.id
  INNER JOIN faculties f
  ON f.id = d.facultyId
WHERE
  f.id = '$fac' AND
  u.role = '2'
ORDER BY
  u.id ASC";
}elseif($dep !=0){
  $sql = "SELECT
  u.id,
  u.userName,
  u.phone,
  u.firstName,
  u.lastName,
  f.id AS facId,
  f.facultyName,
  s.departmentId AS depId,
  s.disabilityType,
  d.departmentName
FROM
  users u
  INNER JOIN studentdetail s
  ON u.id = s.userId
  INNER JOIN departments d
  ON s.departmentId = d.id
  INNER JOIN faculties f
  ON f.id = d.facultyId
WHERE
  s.departmentId = '$dep' AND
  u.role = '2'
ORDER BY
  u.id ASC";
}

$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>=1){
  while($r = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $rows['studentsObj'][] =$r;
  }
}else{
  $rows['studentsObj'] =null;
}
print json_encode($rows,JSON_UNESCAPED_UNICODE);

?>