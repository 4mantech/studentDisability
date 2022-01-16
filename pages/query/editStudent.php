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

$updateStudentDetail = "";

$checkCardId = "SELECT idCardNumber FROM users WHERE id != '$id' AND idCardNumber = '$disaCardId'";
$resultCheck = mysqli_query($conn, $checkCardId);

$query = "UPDATE
  `users`
SET
  `userName` = '$StuId',
  `firstName` = '$name',
  `lastName` = '$surname',
  `phone` = '$telNum',
  `idCardNumber` = '$disaCardId',
  `idCodeAcdemy` = '$StuId',
  `birthDate` = '$birthday',
  `age` = '$age',
  `nickName` = '$nickname'
WHERE
  id = '$id'";

if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {
  $filename = $_FILES['file']['name'];
  $location = "../img/students/" . $filename;
  $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
  $imageFileType = strtolower($imageFileType);

  $newname = $StuId . "." . $imageFileType;
  $location = "../img/students/" . $newname;

  $valid_extensions = array("jpg", "jpeg", "png");

  if (in_array(strtolower($imageFileType), $valid_extensions)) {
    move_uploaded_file($_FILES['file']['tmp_name'], $location);
  }
  $updateStudentDetail = "UPDATE
  `studentdetail`
SET
  `departmentId` = '$dep',
  `address` = '$address',
  `imageProfilePath` = '$newname',
  `subDistrict` = '$subdistrict',
  `district` = '$district',
  `province` = '$province',
  `postalCode` = '$postalCode',
  `disabilityId` = '$disaCardId',
  `disabilityType` = '$disType',
  `yearOfEdu` = '$EduYear'
WHERE
  userId = '$id'";
} else {
  //ไม่มีไฟล์
  $updateStudentDetail = "UPDATE
  `studentdetail`
SET
  `departmentId` = '$dep',
  `address` = '$address',
  `subDistrict` = '$subdistrict',
  `district` = '$district',
  `province` = '$province',
  `postalCode` = '$postalCode',
  `disabilityId` = '$disaCardId',
  `disabilityType` = '$disType',
  `yearOfEdu` = '$EduYear'
WHERE
  userId = '$id'";
}

if (mysqli_num_rows($resultCheck) >= 1) {
  echo "false";
} else {

  $result = mysqli_query($conn, $query);

  if ($result) {

    if (mysqli_query($conn, $updateStudentDetail)) {
      echo "true";
    } else {
      echo "false";
    }
  } else {
    echo "false";
  }
}
mysqli_close($conn);
