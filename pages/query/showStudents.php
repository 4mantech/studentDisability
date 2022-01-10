<?php 
require('connect.php');
$fac = $_GET['fac'];
$dep = $_GET['dep'];
$sql = "";
if($fac == 0 && $dep ==0){
  $sql = "SELECT u.id,u.userName,u.phone FROM users u 
  INNER JOIN studentdetail s ON u.id = s.userId
  INNER JOIN departments d ON s.departmentId = d.id
  INNER JOIN faculties f ON f.id = d.facultyId
  ORDER BY u.id ASC";
}elseif($fac != 0 && $dep ==0 ){
  $sql = "SELECT * FROM users u 
  INNER JOIN studentdetail s ON u.id = s.userId
  INNER JOIN departments d ON s.departmentId = d.id
  INNER JOIN faculties f ON f.id = d.facultyId
  WHERE f.id = '$fac'
  ORDER BY u.id ASC";
}elseif($dep !=0){
  $sql = "SELECT * FROM users u 
  INNER JOIN studentdetail s ON u.id = s.userId
  INNER JOIN departments d ON s.departmentId = d.id
  INNER JOIN faculties f ON f.id = d.facultyId
  WHERE s.departmentId = '$dep'
  ORDER BY u.id ASC";
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