<?php 
require('connect.php');
$sql = "SELECT * FROM users u 
INNER JOIN studentdetail s ON u.id = s.userId
INNER JOIN departments d ON s.departmentId = d.id
INNER JOIN faculties f ON f.id = d.facultyId
ORDER BY u.id ASC";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>=1){
  while($r = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $rows['studentsObj'][] =$r;
  }
  print json_encode($rows,JSON_UNESCAPED_UNICODE);
}



?>