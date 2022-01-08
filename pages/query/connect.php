<?php
$conn = mysqli_connect("localhost","root","","disabilities");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
date_default_timezone_set('Asia/Bangkok');
mysqli_set_charset($conn,'utf8');
?>