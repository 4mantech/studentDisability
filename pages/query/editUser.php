<?php
require('connect.php');
$id = $_POST['id'];
$name = $_POST['name'];
$lastname = $_POST['surname'];
$nickname = $_POST['nickname'];
$birthday = $_POST['birthday'];
$age = $_POST['age'];
$disaCardId = $_POST['DisaCardId'];
$telNum = $_POST['telNum'];
$StuId = $_POST['StuId'];

$checkId = "SELECT * FROM users WHERE id = '$id'";
$resultCheck = mysqli_query($conn,$checkId);

if(mysqli_num_rows($resultCheck)==1){
  $checkDuplicate = "SELECT * FROM users WHERE id != '$id' WHERE idCodeAcdemy = '$StuId' AND idCardNumber='$disaCardId'";
  $resultDuplicate = mysqli_query($conn,$checkDuplicate);
 
  if(mysqli_num_rows($resultDuplicate)>= 1){
    echo "false";
  }else{
    $sql = "UPDATE `users` 
    SET `firstName`='$name',
    `lastName`='$lastname',
    `phone`='$telNum',
    `idCardNumber`='$disaCardId',
    `idCodeAcdemy`='$StuId',
    `birthDate`='$birthday',
    `age`='$age',
    `nickName`='$nickname' WHERE id = $id";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "true";
    }else{
        echo "false";
    }
  }
}else{
  echo "false";
}

mysqli_close($conn);
