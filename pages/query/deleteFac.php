<?php 
$facId = $_POST['facId'];
require('connect.php');
$checkFac = "SELECT * FROM faculties WHERE id = '$facId'";
$resultCheck = mysqli_query($conn,$checkFac);

if(mysqli_num_rows($resultCheck)>= 1){
    $sql = "DELETE FROM faculties WHERE id = '$facId'";
    $result = mysqli_query($conn,$sql);
    echo "true";
  }else{
    echo "false";
  }
  mysqli_close($conn);
?>