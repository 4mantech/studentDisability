<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ดาวน์โหลดเอกสาร</title>
  <?php
  require('../bootstrap5CSS.php');
  require('../bootstrap5JS.php');
  require('query/checkLogin.php');
  if ($_SESSION['role'] != "staff") {
    session_destroy();
    header("Location:../pages/main.php");
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
  <div class="container-fluid" style="margin-bottom: 155px;">
    <div class="row">
      <div class="col-4 mb-4">
      </div>
      <div class="col-4 card border">
        <div class=" card-body mt-2 text-center">
          <h5 id="studentName" class="text-start mt-4 mb-4"></h5>
          <b class=" mt-4">เอกสารแจ้งยอดการชำระเงิน</b>
          <p id="p-payment" class="card-text mt-3">ไฟล์: นักศึกษายังไม่ได้อัพโหลดไฟล์</p> <br>
          <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>" />
          <a id="payment" class="btn btn-info  mt-2" download>ดาวน์โหลดเอกสาร</a> <br>
        </div>
        <div class=" card-body mt-2 text-center">
          <b class=" mt-4 text-start">เอกสารอื่นๆที่เกี่ยวข้องกับนักศึกษาพิการ</b>
          <p id="p-other" class="card-text text-center mt-3">ไฟล์: นักศึกษายังไม่ได้อัพโหลดไฟล์</p> <br>
          <a id="other" class="btn btn-info  mt-2" download>ดาวน์โหลดเอกสาร</a> <br>
        </div>
        <div class=" card-body mt-2 text-center">
          <b class=" mt-4 text-start">เอกสารสำเนาสมุดบัญชีธนาคาร</b>
          <p id="p-bank" class="card-text text-center mt-3">ไฟล์: นักศึกษายังไม่ได้อัพโหลดไฟล์</p> <br>
          <a id="bookbank" class="btn btn-info  mt-2 mb-4" download>ดาวน์โหลดเอกสาร</a> <br>
        </div>
        <div class=" card-body mt-2 text-center"><button type="button" class="btn btn-danger" onclick="window.location.href=`showOneStudent.php?id=<?php echo $_GET['id']; ?>`">ย้อนกลับ</button>
        </div>
      </div>
    </div>
  </div>
  <div class="mt-4">
    <?php require('components/footer.php'); ?>
  </div>
  <script src="ajax/staffDownload.js"></script>
</body>

</html>