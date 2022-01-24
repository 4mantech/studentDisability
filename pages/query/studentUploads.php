<?php
require('connect.php');
$typeFile = $_POST['typeFile'];
$id = $_POST['id'];
$payment = 0;
$bookbank = 0;
$other = 0;
$sql = "SELECT id,idCodeAcdemy FROM users WHERE id = '$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$studentId =  $row['idCodeAcdemy'];

$checkUpload = "SELECT * FROM documents WHERE userId = '$id'";
$resultCheckUpload = mysqli_query($conn,$checkUpload);


if(mysqli_num_rows($resultCheckUpload)>=1){

  while($rows = mysqli_fetch_array($resultCheckUpload,MYSQLI_ASSOC)){
    if($rows['documentName'] == "PaymentStatement"){
      $payment = 1;
    }
    if($rows['documentName'] == "bankPassbook"){
      $bookbank = 1;
    }
    if($rows['documentName'] == "otherDocument"){
      $other = 1;
    }
   }
}

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
      if($other !=1){
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
      echo "true";
    }else{
      echo "fail";
    }
  }
};

if($typeFile == "bankPassbook"){
if (isset($_FILES['bankPassbookFile']['name']) && $_FILES['bankPassbookFile']['name'] != "") {
  $filename = $_FILES['bankPassbookFile']['name'];
  $location = "../documents/students/" . $filename;
  $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
  $imageFileType = strtolower($imageFileType);

  $newname = $studentId."_bankPassbook".".".$imageFileType;
  $location = "../documents/students/" . $newname;
  $valid_extensions = array("jpg");
  if (in_array(strtolower($imageFileType), $valid_extensions)) {
    move_uploaded_file($_FILES['bankPassbookFile']['tmp_name'], $location);
    if($bookbank !=1){
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
 echo "true";
  }else{
    echo "fail";
  }
}
}

if($typeFile == "Payment"){
if (isset($_FILES['PaymentStatementFile']['name']) && $_FILES['PaymentStatementFile']['name'] != "") {
    $filename = $_FILES['PaymentStatementFile']['name'];
    $location = "../documents/students/" . $filename;
    $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);
  
    $newname = $studentId."_PaymentStatement".".".$imageFileType;
    $location = "../documents/students/" . $newname;
    $valid_extensions = array("pdf");
    if (in_array(strtolower($imageFileType), $valid_extensions)) {
      move_uploaded_file($_FILES['PaymentStatementFile']['tmp_name'], $location);
      if($payment !=1){
        $insert = "INSERT INTO
        `documents`(
            `userId`,
            `documentPath`,
            `documentName`,
            `documentType`
        )
    VALUES ('$id', '$newname', 'PaymentStatement', 'pdf')";
     $query = mysqli_query($conn,$insert);
      }
   
   echo "true";
    }else{
      echo "fail";
    }
  }
}

mysqli_close($conn);

?>