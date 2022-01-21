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
  if($_SESSION['role'] != "staff"){
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
    <div class="col-4 mb-4">
    </div>
      <div class="col-4 card border">
          <div class=" card-body mt-2 text-center" >
            <b class=" mt-4">เอกสารแจ้งยอดการชำระเงิน</b>
            <p class="card-text mt-3">ไฟล์</p> <br>
            <a href=".../img/students/potae.jpg" class="btn btn-info  mt-2" download>ดาวน์โหลดเอกสาร</a> <br>
          </div>
          <div class=" card-body mt-2 text-center" >
            <b class=" mt-4 text-start">เอกสารอื่นๆที่เกี่ยวข้องกับนักศึกษาพิการ</b>
            <p class="card-text text-center mt-3">ไฟล์</p> <br>
            <a href=".../img/students/potae.jpg" class="btn btn-info  mt-2" download>ดาวน์โหลดเอกสาร</a> <br>
          </div>
          <div class=" card-body mt-2 text-center" >
            <b class=" mt-4 text-start">เอกสารสำเนาสมุดบัญชีธนาคาร</b>
            <p class="card-text text-center mt-3">ไฟล์</p> <br>
            <a href=".../img/students/potae.jpg" class="btn btn-info  mt-2 mb-4" download>ดาวน์โหลดเอกสาร</a> <br>
          </div>
      </div>
  </div>
</div>
<div class="mt-4">
  <?php require('components/footer.php'); ?>
</div>
</body>
</html>