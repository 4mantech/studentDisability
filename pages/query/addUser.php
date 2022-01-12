<?php
require('connect.php');

$name = $_POST['name'];
$surname = $_POST['surname'];
$nickname = $_POST['nickname'];
$birthday = $_POST['birthday'];
$disaCardId = $_POST['DisaCardId'];
$telNum = $_POST['telNum'];
$StuId = $_POST['StuId'];
$age = $_POST['age'];

$checkCardId = "SELECT idCardNumber FROM users WHERE '$disaCardId' = idCardNumber";
$resultCheck = mysqli_query($conn, $checkCardId);

if (mysqli_num_rows($resultCheck) >= 1) {
  echo "false";
} else {
  $key = "adisak_meetongCPE61346RMUTT,DSSRMUTT";
  $hash_login_password = hash_hmac('sha256',$StuId,$key);
  $query = "INSERT INTO `users`(
  `userName`,
  `password`,
  `firstName`,
  `lastName`,
  `role`,
  `phone`,
  `idCardNumber`,
  `idCodeAcdemy`,
  `birthDate`,
  `age`,
  `nickName`) VALUES ('$StuId','$hash_login_password','$name','$surname','1','$telNum','$disaCardId','$StuId','$birthday','$age','$nickname')";

  $result = mysqli_query($conn, $query);
  if ($result) {
    echo "true";
  } else {
    echo "false";
  }
}
mysqli_close($conn);
