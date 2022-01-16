<?php
require('connect.php');
$id = $_POST['id'];
$facName = $_POST['facName'];

$checkFac = "SELECT * FROM faculties WHERE id != '$id' AND facultyName = '$facName'";
$resultCheck = mysqli_query($conn,$checkFac);
if(mysqli_num_rows($resultCheck) == 1){
  echo "false";
}else{
  $query = "UPDATE `faculties` SET `id`='$id',`facultyName`='$facName' WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if($result){
      echo "true";
    }else{
      echo "false";
    }
}

mysqli_close($conn);
?>