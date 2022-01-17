<?php
require('connect.php');
$facId = $_POST['facId'];
$depId = $_POST['depId'];
$depName = $_POST['depName'];

$checkDep = "SELECT * FROM departments WHERE facultyId != '$facId' AND departmentName = '$depName'";
$resultCheck = mysqli_query($conn, $checkDep);

// while($rows = mysqli_fetch_array($resultCheck,MYSQLI_ASSOC)){
//  echo  $rows['facultyId']." ".$rows['departmentName'];
// }


if (mysqli_num_rows($resultCheck) >= 1) {
  echo "false แรก";
} else {
  $sql = "UPDATE departments SET `departmentName`= '$depName' WHERE id = '$depId' AND facultyId = '$facId' ";
  if (mysqli_query($conn, $sql)) {
    echo "true";
  } else {
    echo "false";
  }
}

mysqli_close($conn);
