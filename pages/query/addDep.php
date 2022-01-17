<?php 
$departmentName = $_POST['departmentName'];
require('connect.php');
$checkFaculty = "SELECT * FROM `departments` WHERE departmentName = '$departmentName'";
$resultCheck = mysqli_query($conn,$checkFaculty);
if(mysqli_num_rows($resultCheck)==1){
  echo json_encode(array("status"=>"department is duplicate"));
}else{
  $sql = "INSERT INTO `departments`(`departmentName`) VALUES ('$departmentName')";
  if(mysqli_query($conn,$sql)){
    echo json_encode(array("status"=>"success"));
  }
}
mysqli_close($conn);

?>