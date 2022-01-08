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

  mysqli_close($conn);
  $_SESSION['login_id'] = $row_user['userName'];
  if($row_user['role'] == 0){
    $_SESSION['role'] = "admin";
    echo json_encode(array("status"=>"true","role"=>"admin"));
  }elseif($row_user['role'] == 1){
    $_SESSION['role'] = "staff";
    echo json_encode(array("status"=>"true","role"=>"staff"));
  }elseif($row_user['role'] == 2){
    $_SESSION['role'] = "student";
    echo json_encode(array("status"=>"true","role"=>"student"));
  }else{
    echo json_encode(array("status"=>"false"));
  }
}else{
  echo json_encode(array("status"=>"false","message"=>"can't login"));
}
mysqli_free_result($result_user);
?>