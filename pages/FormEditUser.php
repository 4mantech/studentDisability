<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ข้อมูลนักศึกษาพิการ</title>
  <link rel="stylesheet" href="../assets/css/styleMain.css">
  <?php
  require('../bootstrap5CSS.php');
  require('../bootstrap5JS.php');
  require('query/checkLogin.php');
  ?>
</head>

<body>
  <?php require('components/navbar.php'); ?>
  <div class="container-fluid" style="margin-bottom: 100px;">
    <div class="row">
      <div class="col-2">
      </div>
      <div id="profilepic" class=" card col-8 border mt-2 mb-5">
        <h4 class="mt-4">&nbsp;&nbsp; แก้ไขข้อมูลส่วนตัว</h4>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data" id="myform">
            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-4">

                <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>" />
                <div class=" text-start form-outline mb-3 ">
                  <label>ชื่อจริง</label>
                  <input type="text" name="name" id="name" class="form-control form-control-md" placeholder="ชื่อจริง" required />
                </div>
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>นามสกุล</label>
                  <input type="text" name="surname" id="surname" class="form-control form-control-md" placeholder="นามสกุล" required />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>วัน/เดือน/ปีเกิด</label>
                  <input type="date" name="birthday" id="birthday" class="form-control form-control-md" min="1995-01-01" max="2022-12-31" placeholder="วัน/เดือน/ปีเกิด" required />
                </div>
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>อายุ</label>
                  <input type="text" name="age" id="age" class="form-control form-control-md" placeholder="อายุ" disabled />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>รหัสประจำตัวสถานศึกษา</label>
                  <input type="text" name="StuId" id="StuId" class="form-control form-control-md" placeholder="รหัสประจำตัวสถานศึกษา" required />
                </div>
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>เลขบัตรประชาชน</label>
                  <input type="text" name="DisaCardId" id="DisaCardId" class="form-control form-control-md" placeholder="เลขบัตรประชาชน" required />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>เบอร์โทรศัพท์</label>
                  <input type="text" name="telNum" id="telNum" class="form-control form-control-md" placeholder="เบอร์โทรศัพท์" required />
                </div>
              </div>

              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>ชื่อเล่น</label>
                  <input type="text" name="nickname" id="nickname" class="form-control form-control-md" placeholder="ชื่อเล่น" required />
                </div>
              </div>

              <div class="row">
                <div class="col-2">
                </div>
                <div class="col-8 text-center mt-4 mb-4">
                  <button id="submit" type="button" class="btn btn-success">บันทึก</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="mt-4 mb-5">
    <?php require('components/footer.php'); ?>
  </div>
  <script src="ajax/editUser.js"></script>
</body>
</html>