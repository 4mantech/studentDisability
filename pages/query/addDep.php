<?php 
$departmentName = $_POST['depName'];
$facId = $_POST['facId'];

require('connect.php');
$checkDepartment = "SELECT * FROM `departments` WHERE departmentName = '$departmentName' AND facultyId = '$facId' ";
$resultCheck = mysqli_query($conn,$checkDepartment);
if(mysqli_num_rows($resultCheck)>=1){
  echo json_encode(array("status"=>"department is duplicate"));
}else{
  $sql = "INSERT INTO `departments`(`facultyId`,`departmentName`) VALUES ('$facId','$departmentName')";
  if(mysqli_query($conn,$sql)){
    echo json_encode(array("status"=>"success"));
  }
}
mysqli_close($conn);
?>