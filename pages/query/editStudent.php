<?php 
require('connect.php');
$id = $_POST['id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$nickname = $_POST['nickname'];
$birthday = $_POST['birthday'];
$age = $_POST['age'];
$address = $_POST['address'];
$province = $_POST['Province'];
$subdistrict = $_POST['subdistrict'];
$district = $_POST['District'];
$postalCode = $_POST['PostalCode'];
$disaCardId = $_POST['DisaCardId'];
$disType = $_POST['disType'];
$telNum = $_POST['telNum'];
$EduYear = $_POST['EduYear'];
$StuId = $_POST['StuId'];
$fac = $_POST['fac'];
$dep = $_POST['dep'];

$checkCardId = "SELECT idCardNumber FROM users WHERE id != '$id' AND idCardNumber = '$disaCardId'";
$resultCheck = mysqli_query($conn, $checkCardId);

if (mysqli_num_rows($resultCheck) >= 1) {
  echo "false";
} else {
  $query = "UPDATE `users` SET `userName`='$StuId',`firstName`='$name',
  `lastName`='$surname',`phone`='$telNum',`idCardNumber`='$disaCardId',`idCodeAcdemy`='$StuId',
  `birthDate`='$birthday',`age`='$age',`nickName`='$nickname' WHERE id = '$id'";
  $result = mysqli_query($conn, $query);

  if ($result) {
    $updateStudentDetail = "UPDATE `studentdetail` SET `departmentId`='$dep',`address`='$address',
    `subDistrict`='$subdistrict',`district`='$district',`province`='$province',
    `postalCode`='$postalCode',`disabilityId`='$disaCardId',`disabilityType`='$disType',`yearOfEdu`='$EduYear' WHERE userId = $id";
    if(mysqli_query($conn,$updateStudentDetail)){
      echo "true";
    }else{
      echo "false";
    }
  } else {
    echo "false";
  }
 
}
mysqli_close($conn);

?>