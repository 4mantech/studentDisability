<?php 
require('connect.php');
$file = $_POST['file'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$nickname = $_POST['nickname'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];
$province = $_POST['Province'];
$district = $_POST['District'];
$postalCode = $_POST['PostalCode'];
$disaCardId = $_POST[''];
$disType = $_POST['disType'];
$telNum = $_POST['telNum'];
$EduYear = $_POST['EduYear'];
$StuId = $_POST['StuId'];
$fac = $_POST['fac'];
$dep = $_POST['dep'];

$checkCardId = "SELECT idCardNumber FROM users WHERE "
?>