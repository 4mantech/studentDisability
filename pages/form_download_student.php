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
  if ($_SESSION['role'] != "student") {
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
      <div class="col-2 mt-4">
      </div>
      <div class=" card col-8 mt-2 text-center">
        <div class="card-text"></div>
          <h4 class="mt-4 text-start">&nbsp;&nbsp; ดาวน์โหลดเอกสาร</h4>
          <p class="mt-4"><strong>เอกสารแสดงความจำนงขอรับเงินอุดหนุน</strong>
            ไฟล์: เอกสารแสดงความจำนงขอรับเงินอุดหนุน.pdf</p> <br>
            <div class="col-12 text-center">
              <a href="documents/StaffUpload.pdf" download="เอกสารแสดงความจำนงขอรับเงินอุดหนุน.pdf" class=" btn btn-info mb-4 mt-2" download>ดาวน์โหลดเอกสาร</a><br>
            </div>
          
        </div>
      </div>

    </div>
  </div>
  <div class="mt-4">
    <?php require('components/footer.php'); ?>
  </div>
</body>

</html>