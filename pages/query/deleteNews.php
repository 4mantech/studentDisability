<?php 
require('connect.php');
$id = $_GET['id'];

$sql = "DELETE FROM articlesslide WHERE id = '$id'";

if(mysqli_query($conn,$sql)){
  header("Location:../manageNews.php");
}else{
  header("Location:../manageNews.php");
}
mysqli_close($conn);
?>