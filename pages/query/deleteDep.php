<?php 
require('connect.php');
$depId = $_POST['depId'];
$checkDep = "SELECT * FROM departments WHERE id = '$depId'";
$resultCheck = mysqli_query($conn,$checkDep);

echo mysqli_num_rows($resultCheck);
if(mysqli_num_rows($resultCheck)>= 1){
  $sql = "DELETE FROM departments WHERE id = '$depId'";
  $result = mysqli_query($conn,$sql);
  echo "true";
}else{
  echo "false";
}
mysqli_close($conn);
?>