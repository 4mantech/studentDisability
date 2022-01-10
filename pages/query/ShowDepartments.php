<?php 
require('connect.php');
$facId = $_GET['fac'];
$sql = "";
if($facId == 0){
  $sql = "SELECT * FROM departments";
}else{
  $sql = "SELECT * FROM departments WHERE facultyId = '$facId'";
}
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>=1){
  while($r = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $rows['depObj'][] =$r;
  }
  print json_encode($rows,JSON_UNESCAPED_UNICODE);
}
mysqli_close($conn);

?>