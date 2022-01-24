<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>จัดการสาขา</title>
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
  <!--start เพิ่มสาขาวิชา -->
  <div class="modal fade" id="addDepModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มสาขา</h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-3">
              เพิ่มสาขา
            </div>
            <div class="col">
            <form method="post" enctype="multipart/form-data" id="formAddDep">
            <input class="form-control" type="hidden" id="facId" name="facId" value="<?php echo $_GET['facId'] ;?>">
            <input class="form-control" type="text" id="depName" name="depName" placeholder="ชื่อสาขา" required>
            </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="closemodal" data-mdb-dismiss="modal" class="btn btn-danger">ยกเลิก</button>
          <button type="button" id="confirmAdd" class="btn btn-success">ยืนยัน</button>
        </div>
      </div>
    </div>
  </div>

  <!-- end เพิ่มสาขาวิชา -->


  <div class="modal fade" id="editDepModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขสาขา</h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-3">
              แก้ไขสาขา
            </div>
            <div class="col">
              <input type="hidden" name="facIdForEdit" id="facIdForEdit">
              <input type="hidden" name="depIdForEdit" id="depIdForEdit">
            <input class="form-control" type="text" id="depNameForEdit" name="depNameForEdit" placeholder="ชื่อสาขา" required>
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
    #addDep {
      position: relative;
      left: 81%;
    }
  </style>
  <?php require('components/navbar.php'); ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-2">
      </div>
      <div class=" col-8 mt-2">
        <h4>จัดการสาขา</h4>
        <span id="facName"></span>
        <button id="addDep" type="button" class="btn btn-success mb-3">เพิ่มสาขา</button>
        <div class="row">
          <table class="table table-striped" id="tableDep">
            <thead>
              <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col">ชื่อสาขา</th>
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
  <script src="ajax/manageDep.js"></script>
</body>

</html>