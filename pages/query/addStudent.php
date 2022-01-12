<?php 
require('connect.php');
$name = $_POST['name'];
$surname = $_POST['surname'];
$nickname = $_POST['nickname'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];
$province = $_POST['Province'];
$district = $_POST['District'];
$postalCode = $_POST['PostalCode'];
$disaCardId = $_POST['DisaCardId'];
$disType = $_POST['disType'];
$telNum = $_POST['telNum'];
$EduYear = $_POST['EduYear'];
$StuId = $_POST['StuId'];
$fac = $_POST['fac'];
$dep = $_POST['dep'];

echo $_FILES['file']['name']."<br>".$name."<br>".$surname."<br>".$nickname."<br>".$birthday."<br>".$address."<br>".$province."<br>"
.$district."<br>".$postalCode."<br>".$disaCardId."<br>".$disType."<br>".$telNum."<br>".$EduYear."<br>".$StuId."<br>".$fac."<br>".$dep."<br>";


// if(isset($_FILES['file']['name'])){
//     $filename = $_FILES['file']['name'];
//     $location = "../img/students/".$filename;
//     $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
//     $imageFileType = strtolower($imageFileType);

//     $newname = $name.".".$imageFileType;
//     $location = "../img/students/".$newname;
 
//     $valid_extensions = array("jpg","jpeg","png");

//     if(in_array(strtolower($imageFileType), $valid_extensions)) {
//        move_uploaded_file($_FILES['file']['tmp_name'],$location);
//     }
//  }

// $checkCardId = "SELECT idCardNumber FROM users WHERE "
?>