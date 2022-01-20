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
    <div class="col-2">
    </div>
    <div class=" col-8 mt-2" >
        <div class="card">
        <div class="card-body">
          <div class="mb-3">
            <div class="row">
              <div class="col-3">
              </div>
              <div class="col-6">
              <form id="fupForm" enctype="multipart/form-data">
              <label style="font-size:20px;"class="card-title">อัพโหลดเอกสารแสดงความจำนงขอรับเงินอุดหนุน</label>
                <input class="form-control mb-3" type="file" name="file" id="file" accept="application/pdf">
                <div class="text-center">
                <button type="button" id="uploadBtn" class="btn btn-success">บันทึก</button>
                <button type="button" class="btn btn-danger">ยกเลิก</button>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
  </div>
</div>
<div class="mt-4">
  <?php require('components/footer.php'); ?>
</div>
<script src="ajax/staffUpload.js"></script>
</body>
</html>