<?php 
$facultyName = $_POST['facultyName'];
require('connect.php');
$checkFaculty = "SELECT * FROM `faculties` WHERE facultyName = '$facultyName'";
$resultCheck = mysqli_query($conn,$checkFaculty);
if(mysqli_num_rows($resultCheck)==1){
  echo json_encode(array("status"=>"faculty is duplicate"));
}else{
  $sql = "INSERT INTO `faculties`(`facultyName`) VALUES ('$facultyName')";
  if(mysqli_query($conn,$sql)){
    echo json_encode(array("status"=>"success"));
  }
}
mysqli_close($conn);

?>