<?php 
require('connect.php');

$imageName = $_POST['imageName'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

 if(isset($_FILES['file']['name'])){
  /* Getting file name */
  $filename = $_FILES['file']['name'];
  /* Location */
  $location = "../img/news/".$filename;
  $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
  $imageFileType = strtolower($imageFileType);

  $newname = $imageName.".".$imageFileType;
  $location = "../img/news/".$newname;

  /* Valid extensions */
  $valid_extensions = array("jpg","jpeg","png");

  /* Check file extension */
  if(in_array(strtolower($imageFileType), $valid_extensions)) {
     /* Upload file */
     move_uploaded_file($_FILES['file']['tmp_name'],$location);
  }
}

$query = "INSERT INTO `articlesslide`(`imagePath`, `imageName`, `startDate`, `endDate`) 
          VALUES ('$newname','$imageName','$startDate','$endDate')";
$result = mysqli_query($conn,$query);
if($result){
  echo "true";
}else{
  echo "false";
}
?>