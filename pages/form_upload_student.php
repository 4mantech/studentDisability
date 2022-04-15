<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>อัพโหลดเอกสาร</title>
  <?php
  require('../bootstrap5CSS.php');
  require('../bootstrap5JS.php');
  require('query/checkLogin.php');
  if ($_SESSION['role'] != "student") {
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
  <div class="container-fluid">
    <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['login_id']; ?>">
    <div class="row">
      <div class="col-2">
      </div>
      <div class=" col-8 mt-2">
        <div class="card">
          <div class="card-body">
            <div class="mb-3">
              <h4 class="mt-3">&nbsp;&nbsp; อัพโหลดเอกสาร</h4>
              <div class="row">
                <div class="col-2">
                </div>
                <div class="col-8">
                  <div class="row">
                    <div class="col-12">
                      <label style="font-size:20px;" class="card-title">เอกสารแจ้งยอดการชำระเงิน</label>
                      <label class="card-title" id="statusPaymentStatementLabel"></label>
                    </div>
                    <form method="post" enctype="multipart/form-data" id="PaymentForm">
                      <div class="row">
                        <div class="col-10">
                          <input class="form-control mb-2" name="PaymentStatementFile" type="file" id="PaymentStatementFile" accept="application/pdf"><br>
                        </div>
                        <div class="col-2">
                          <button type="button" id="PaymentStatementUpload" class="btn btn-success" disabled>บันทึก</button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <label style="font-size:20px;" class="card-title">เอกสารอื่นที่เกี่ยวข้องกับนักศึกษาพิการ</label>
                      <label class="card-title" id="otherDocumentLabel"></label>
                    </div>
                    <form method="post" enctype="multipart/form-data" id="otherForm">
                      <div class="row">
                        <div class="col-10">
                          <input class="form-control mb-2" name="otherDocumentFile" type="file" id="otherDocumentFile" accept="application/pdf"><br>
                        </div>
                        <div class="col-2">
                          <button type="button" id="otherDocumentUpload" class="btn btn-success" disabled>บันทึก</button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="row">
                    <form method="post" enctype="multipart/form-data" id="bankForm">
                      <div class="col-12">
                        <label style="font-size:20px;" class="card-title">เอกสารสำเนาสมุดบัญชีธนาคาร</label>
                        <label class="card-title" id="bankPassbookLabel"></label>
                      </div>
                      <div class="row">
                        <div class="col-10">
                          <input class="form-control mb-2" name="bankPassbookFile" type="file" id="bankPassbookFile" accept="image/jpg, image/jpeg"><br>
                        </div>
                        <div class="col-2">
                          <button type="button" id="bankPassbookUpload" class="btn btn-success" disabled>บันทึก</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="mt-4">
    <?php require('components/footer.php'); ?>
  </div>
  <script src="ajax/studentUpload.js"></script>
</body>


</html>