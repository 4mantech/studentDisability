<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>จัดการผู้ใช้งาน</title>
  <?php 
  require('../bootstrap5CSS.php'); 
  require('../bootstrap5JS.php'); 
  require('query/checkLogin.php');
  if($_SESSION['role'] != "admin"){
    session_destroy();
    header("Location:../main.php");
  }
  ?>
  <link rel="stylesheet" href="../assets/css/styleMain.css">
</head>
<style>
    #addUser {
        position: relative;
        left:92%;
    }
</style>
<body>
<?php require('components/navbar.php'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-2">
    </div>
    <div class=" col-8 mt-2">
      <h4>จัดการข้อมูลผู้ใช้</h4>
      <a href="form_add_user.php" id="addUser" type="button" class="btn btn-success mb-3"> เพิ่มผู้ใช้งาน </a>
      <div class="row">
      <table class="table table-striped" id="tableUsers">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">รหัสประจำตัว</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">ตำแหน่ง</th>
    </tr>
  </thead>
  <tbody id="tbody">
  </tbody>
</table>
      </div>
    </div>
  </div>
</div>
<div class="mt-4">
  <?php require('components/footer.php'); ?>
</div>
<script src="ajax/manageUsers.js"></script>
</body>
</html>