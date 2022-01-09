<?php 
session_start();
if(!isset($_SESSION['login_id'])){
  header("location:index.php");
}

require 'connect.php';
$session_login_id = $_SESSION['login_id'];
$qry_user = "SELECT * FROM users WHERE id ='$session_login_id'";
$result_user = mysqli_query($conn,$qry_user);
  if ($result_user) {
      $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
      $s_login_username = $row_user['firstName']. " ". $row_user['lastName'];
      if($row_user['role'] ==0){
        $s_login_role =  "แอดมิน";
      }elseif($row_user['role'] ==1){
        $s_login_role =  "เจ้าหน้าที่";
      }elseif($row_user['role'] ==2){
        $s_login_role =  "นักศึกษา";
      }
  }
  mysqli_close($conn); 
?>