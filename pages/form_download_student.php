<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>หน้าหลัก</title>
  <?php 
  require('../bootstrap5CSS.php'); 
  require('../bootstrap5JS.php'); 
  require('query/checkLogin.php');
  if($_SESSION['role'] != "student"){
    session_destroy();
    header("Location:../main.php");
  }
  ?>
</head>
<style>
  body {
    background-image: url('img/bgMain.png');
  }
</style>
<body>
<?php require('components/navbar.php'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-4 mt-4">
    </div>
      <div class=" card col-4 mt-2 text-center" >
        <div class="card-header">
          <b>เอกสารแสดงความจำนงขอรับเงินอุดหนุน</b>
          <a>ไฟล์</a> <br>
          <a href=".../img/students/potae.jpg" class="btn btn-info" download>ดาวน์โหลดเอกสาร</a><br>
        </div>
    </div>
    
  </div>
</div>
<div class="mt-4">
  <?php require('components/footer.php'); ?>
</div>
</body>
</html>