<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ข้อมูลนักศึกษาพิการ</title>
  <?php
  require('../bootstrap5CSS.php');
  require('../bootstrap5JS.php');
  require('query/checkLogin.php');
  if($_SESSION['role'] != "staff"){
    session_destroy();
    header("Location:../main.php");
  }
  ?>
  <link rel="stylesheet" href="../assets/css/styleMain.css">
</head>
<style>
  #addStudent {
    position: relative;
    left:35%;
  }
</style>

<body>
  <?php require('components/navbar.php'); ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-2">
      </div>
      <div class=" col-8 mt-2">
        <h4>ข้อมูลนักศึกษาพิการ</h4>
        <div class="row">
          <div class="col-4">
            <label>คณะ</label>
            <select class="form-select" id="fac" aria-label="Default select example">
              <option value="0" selected></option>
            </select>
          </div>
          <div class="col-4">
            <label>สาขา</label>
            <select class="form-select" id="dep" aria-label="Default select example">
              <option value="0" selected></option>
            </select>
          </div>
          <div class="col-4 text-center">
            <br>
            <a href="form_add_student.php" id="addStudent" type="button" class="btn btn-success">เพิ่มนักศึกษา</a>
          </div>
        </div>

        <div id="forTable" class="mt-4">
          <table class="table table-hover text-center" id="studentsTable">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">รหัสนักศึกษา</th>
                <th scope="col">ชื่อ-นามสกุล</th>
                <th scope="col">คณะ</th>
                <th scope="col">สาขา</th>
                <th scope="col">ความพิการ</th>
                <th scope="col">เบอร์โทร</th>
                <th scope="col">ตรวจสอบ</th>
                <th scope="col">ลบ</th>
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
  <script src="ajax/showStudents.js"></script>
</body>

</html>