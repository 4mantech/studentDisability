<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>จัดการคณะ</title>
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

<body>

  <div class="modal fade" id="addfacmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มคณะ</h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-3">
              เพิ่มคณะ
            </div>
            <div class="col">
            <input class="form-control" type="hidden" id="facId" name="facId">
            <input class="form-control" type="text" id="facultyName" name="facultyName" placeholder="ชื่อคณะ" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="closemodal" data-mdb-dismiss="modal" class="btn btn-danger">ยกเลิก</button>
          <button type="button" id="confirmAdd" class="btn btn-success">ยืนยัน</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editFacModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขคณะ</h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-3">
              แก้ไขคณะ
            </div>
            <div class="col">
            <input class="form-control" type="text" id="facultyNameForEdit" name="facultyNameForEdit" placeholder="ชื่อคณะ" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="closeModalEdit" data-mdb-dismiss="modal" class="btn btn-danger">ยกเลิก</button>
          <button type="button" id="confirmEdit" class="btn btn-success">ยืนยัน</button>
        </div>
      </div>
    </div>
  </div>

  <style>
    #addFac {
      position: relative;
      left: 94%;
    }
  </style>
  <?php require('components/navbar.php'); ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-2">
      </div>
      <div class=" col-8 mt-2">
        <h4>คณะ</h4>
        <button id="addFac" type="button" class="btn btn-success mb-3">เพิ่มคณะ</button>
        <div class="row">
          <table class="table table-striped" id="tableFac">
            <thead>
              <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col">ชื่อคณะ</th>
                <th scope="col" class="text-center">Action</th>
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
    <br> <br> <br> <br>
    <?php require('components/footer.php'); ?>
  </div>
  <script src="ajax/manageFac.js"></script>
</body>

</html>