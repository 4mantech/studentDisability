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
              <option selected></option>
              <option value="2">คณะวิศวกรรมศาสตร์</option>
              <option value="3">คณะบริหารธุรกิจ</option>
              <option value="4">คณะเทคโนโลยีคหกรรมศาสตร์</option>
              <option value="5">คณะศิลปกรรมศาสตร์</option>
              <option value="6">คณะเทคโนโลยีการเกษตร</option>
              <option value="7">คณะครุศาสตร์อุตสาหกรรม</option>
              <option value="8">คณะสถาปัตยกรรมศาสตร์</option>
              <option value="9">คณะวิทยาศาสตร์และเทคโนโลยี</option>
              <option value="10">คณะเทคโนโลยีสื่อสารมวลชน</option>
              <option value="11">คณะศิลปศาสตร์</option>
              <option value="12">คณะการแพทย์บูรณาการ</option>
              <option value="13">คณะพยาบาลศาสตร์</option>
            </select>
          </div>
          <div class="col-4">
            <label>สาขา</label>
            <select class="form-select" aria-label="Default select example">
              <option selected></option>
              <option value="1">วิศวกรรมคอมพิวเตอร์</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="col-4 text-center">
            <br>
            <button id="addStudent" type="button" class="btn btn-success">เพิ่มนักศึกษา</button>
          </div>
        </div>

        <div id="forTable" class="mt-4">
          <table class="table table-hover text-center" id="studentsTable">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">รหัสนักศึกษา</th>
                <th scope="col">ชื่อ-นามสกุล</th>
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