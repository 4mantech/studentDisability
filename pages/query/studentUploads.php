<?php
require('connect.php');
$typeFile = $_POST['typeFile'];
$id = $_POST['id'];

$sql = "SELECT id,idCodeAcdemy FROM users WHERE id = '$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$studentId =  $row['idCodeAcdemy'];

if($typeFile == "otherDocument"){
  if (isset($_FILES['otherDocumentFile']['name']) && $_FILES['otherDocumentFile']['name'] != "") {
    $filename = $_FILES['otherDocumentFile']['name'];
    $location = "../documents/students/" . $filename;
    $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);

    $newname = $studentId."_otherDoc".".".$imageFileType;
    $location = "../documents/students/" . $newname;
    $valid_extensions = array("pdf");
    if (in_array(strtolower($imageFileType), $valid_extensions)) {
      move_uploaded_file($_FILES['otherDocumentFile']['tmp_name'], $location);
      $insert = "INSERT INTO
      `documents`(
          `userId`,
          `documentPath`,
          `documentName`,
          `documentType`
      )
  VALUES ('$id', '$newname', 'otherDocument', 'pdf')";
   $query = mysqli_query($conn,$insert);
    }
  }
};

if($typeFile == "bankPassbook"){
if (isset($_FILES['bankPassbookFile']['name']) && $_FILES['bankPassbookFile']['name'] != "") {
  $filename = $_FILES['otherDocumentFile']['name'];
  $location = "../documents/students/" . $filename;
  $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
  $imageFileType = strtolower($imageFileType);

  $newname = $studentId."_bankPassbook".".".$imageFileType;
  $location = "../documents/students/" . $newname;
  $valid_extensions = array("jpg");
  if (in_array(strtolower($imageFileType), $valid_extensions)) {
    move_uploaded_file($_FILES['bankPassbookFile']['tmp_name'], $location);
    $insert = "INSERT INTO
    `documents`(
        `userId`,
        `documentPath`,
        `documentName`,
        `documentType`
    )
VALUES ('$id', '$newname', 'bankPassbook', 'jpg')";
 $query = mysqli_query($conn,$insert);
  }
}
}

if($typeFile == "Payment"){
if (isset($_FILES['PaymentStatementFile']['name']) && $_FILES['PaymentStatementFile']['name'] != "") {
    $filename = $_FILES['otherDocumentFile']['name'];
    $location = "../documents/students/" . $filename;
    $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);
  
    $newname = $studentId."_payment".".".$imageFileType;
    $location = "../documents/students/" . $newname;
    $valid_extensions = array("pdf");
    if (in_array(strtolower($imageFileType), $valid_extensions)) {
      move_uploaded_file($_FILES['bankPassbookFile']['tmp_name'], $location);
      $insert = "INSERT INTO
      `documents`(
          `userId`,
          `documentPath`,
          `documentName`,
          `documentType`
      )
  VALUES ('$id', '$newname', 'otherDocument', 'jpg')";
   $query = mysqli_query($conn,$insert);
    }
  }
}

// if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {
//   $filename = $_FILES['file']['name'];
//   $location = "../img/students/" . $filename;
//   $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
//   $imageFileType = strtolower($imageFileType);

//   $newname = $name . "." . $imageFileType;
//   $location = "../img/students/" . $newname;

//   $valid_extensions = array("jpg", "jpeg", "png");

//   if (in_array(strtolower($imageFileType), $valid_extensions)) {
//   //  move_uploaded_file($_FILES['file']['tmp_name'], $location);
//   }
// }
mysqli_close($conn);

?>