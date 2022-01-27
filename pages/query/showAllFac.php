<?php 
require('connect.php');
$sql = "SELECT f.id,f.facultyName,COUNT(d.facultyId) coutDep FROM `faculties` f LEFT JOIN departments d ON f.id = d.facultyId GROUP BY f.id ORDER BY f.id";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>=1){
  while($r = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $rows['facObj'][] =$r;
  }
}else{
  $rows['facObj']= null;
}
print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>