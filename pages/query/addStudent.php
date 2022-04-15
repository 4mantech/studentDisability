<?php
require('connect.php');
$prefix = $_POST['prefix'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$nickname = $_POST['nickname'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];
$subdistrict = $_POST['subDistrict'];
$postalCode = $_POST['PostalCode'];
$disaCardId = $_POST['DisaCardId'];
$age = $_POST['age'];
$disType = $_POST['disType'];
$telNum = $_POST['telNum'];
$EduYear = $_POST['EduYear'];
$StuId = $_POST['StuId'];
$fac = $_POST['fac'];
$dep = $_POST['dep'];

if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {
  $filename = $_FILES['file']['name'];
  $location = "../img/students/" . $filename;
  $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
  $imageFileType = strtolower($imageFileType);

  $newname = $name . "." . $imageFileType;
  $location = "../img/students/" . $newname;

  $valid_extensions = array("jpg", "jpeg", "png");

  if (in_array(strtolower($imageFileType), $valid_extensions)) {
    move_uploaded_file($_FILES['file']['tmp_name'], $location);
  }
}else{
  $newname = "profile.jpg";
}

$checkCardId = "SELECT idCardNumber FROM users WHERE '$disaCardId' = idCardNumber";
$resultCheck = mysqli_query($conn, $checkCardId);

if (mysqli_num_rows($resultCheck) >= 1) {
  echo "false";
} else {
  $key = "adisak_meetongCPE61346RMUTT,DSSRMUTT";
  $hash_login_password = hash_hmac('sha256', $disaCardId, $key);
  $query2 = "INSERT INTO
  `users`(
      `userName`,
      `password`,
      `prefix`,
      `firstName`,
      `lastName`,
      `role`,
      `phone`,
      `idCardNumber`,
      `idCodeAcdemy`,
      `birthDate`,
      `age`,
      `nickName`
  )
VALUES (
      '$StuId',
      '$hash_login_password',
      '$prefix',
      '$name',
      '$surname',
      '2',
      '$telNum',
      '$disaCardId',
      '$StuId',
      '$birthday',
      '$age',
      '$nickname'
  )";
}

$result = mysqli_query($conn, $query2);
if ($result) {
  $findUserId = "SELECT * FROM users WHERE userName = '$StuId'";
  $resultFindId = mysqli_query($conn, $findUserId);
  $row = mysqli_fetch_array($resultFindId, MYSQLI_ASSOC);
  $userId = $row['id'];

  $query = "INSERT INTO
    `studentdetail`(
        `userId`,
        `departmentId`,
        `address`,
        `imageProfilePath`,
        `subDistrict`,
        `postalCode`,
        `disabilityId`,
        `disabilityType`,
        `yearOfEdu`
    )
VALUES (
        '$userId',
        '$dep',
        '$address',
        '$newname',
        '$subdistrict',
        '$postalCode',
        '$disaCardId',
        '$disType',
        '$EduYear'
    )";

  $result2 = mysqli_query($conn, $query);
  if ($result2) {
    echo "true";
  } else {
    echo "false";
  }
} else {
  echo "false";
}
mysqli_close($conn);
