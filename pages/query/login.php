<?php 
require('connect.php');
$stuId = mysqli_real_escape_string($conn,$_POST['username']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$key = "adisak_meetongCPE61346RMUTT,DSSRMUTT";
$hash_login_password = hash_hmac('sha256',$password,$key);


$sql = "SELECT * FROM users WHERE userName=? AND password=?";
$stmt = mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"ss",$stuId, $hash_login_password);
mysqli_stmt_execute($stmt);
$result_user = mysqli_stmt_get_result($stmt);

if($result_user->num_rows ==1 ){
  session_start();
  $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);

  $_SESSION['login_id'] = $row_user['id'];
  $id =  $row_user['id'];
  if($row_user['role'] == 0){
    $_SESSION['role'] = "admin";
    $_SESSION['statusLogin'] = 1;
    header("Location:../main.php");
  }elseif($row_user['role'] == 1){
    $_SESSION['role'] = "staff";
    $_SESSION['statusLogin'] = 1;
    header("Location:../main.php");
  }elseif($row_user['role'] == 2){
    $_SESSION['role'] = "student";
    $_SESSION['statusLogin'] = 1;
    $checkFile = "SELECT * FROM `documents` WHERE userId = '$id'";
    $resultCheck = mysqli_query($conn,$checkFile);
    echo mysqli_num_rows($resultCheck);
    if(mysqli_num_rows($resultCheck)==3){
      $_SESSION['notice'] = "0";
    }else{
      $_SESSION['notice'] = "1";
    }
    header("Location:../main.php");
  }else{
    $_SESSION['statusLogin'] = 0;
    header("Location:../index.php?status=0");
  }
}else{
  $_SESSION['statusLogin'] = 0;
  header("Location:../index.php?status=0");
}
mysqli_close($conn);

?>