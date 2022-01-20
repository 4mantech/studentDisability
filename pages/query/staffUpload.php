<?php 
require('connect.php');
if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {
  $filename = $_FILES['file']['name'];
  $location = "../documents/" . $filename;
  $fileType = pathinfo($location, PATHINFO_EXTENSION);
  $fileType = strtolower($fileType);

  $newname = "StaffUpload." . $fileType;
  $location = "../documents/" . $newname;

  $valid_extensions = array("pdf");

  if (in_array(strtolower($fileType), $valid_extensions)) {
    move_uploaded_file($_FILES['file']['tmp_name'], $location);
    echo json_encode(array("status"=>"success"),JSON_UNESCAPED_UNICODE);
  }else{
    echo json_encode(array("status"=>"failed"),JSON_UNESCAPED_UNICODE);
  }
}else{
  echo json_encode(array("status"=>"failed"),JSON_UNESCAPED_UNICODE);
}

?>