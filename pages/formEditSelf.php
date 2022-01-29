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
  if ($_SESSION['role'] != "student") {
    session_destroy();
    header("Location:../main.php");
  }
  ?>
</head>

<body>
  <?php require('components/navbar.php'); ?>
  <div class="container-fluid" style="margin-bottom: 100px;">
    <form method="post" enctype="multipart/form-data" id="studentInfo">
      <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
      <div class="row">
        <div class="col-2">
        </div>
        <div id="profilepic" class=" card col-8 border mt-2 mb-5">
          <h4 class="mt-4">&nbsp;&nbsp; แก้ไขข้อมูลส่วนตัว</h4>
          <div class=" text-center mt-4">
            <img class="border border-dark mb-4" name="file" id="profileimg" src="img/students/profile.jpg" style="width:150px;height:auto;">
            <div class="row">
              <div class="col"></div>
              <div class="col">
                <input class="form-control mb-2 canEdit" type="file" name="file" id="file" accept="image/jpg, image/jpeg, image/png" disabled>
              </div>
              <div class="col">
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>ชื่อจริง</label>
                  <input type="text" name="name" id="name" class="form-control form-control-md canEdit" placeholder="ชื่อจริง" required disabled />
                </div>
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>นามสกุล</label>
                  <input type="text" name="surname" id="surname" class="form-control form-control-md canEdit" placeholder="นามสกุล" required disabled />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>ชื่อเล่น</label>
                  <input type="text" name="nickname" id="nickname" class="form-control form-control-md canEdit" placeholder="ชื่อเล่น" required disabled />
                </div>
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>วัน/เดือน/ปีเกิด</label>
                  <input type="date" name="birthday" id="birthday" class="form-control form-control-md canEdit" min="1995-01-01" max="2022-12-31" placeholder="วัน/เดือน/ปีเกิด" required disabled />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>อายุ</label>
                  <input type="text" name="age" id="age" class="form-control form-control-md" placeholder="อายุ" disabled disabled />
                </div>
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>ที่อยู่</label>
                  <textarea type="text" name="address" id="address" class="form-control form-control-md canEdit" placeholder="ที่อยู่" required disabled></textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3">
                  <label>ตำบล</label>
                  <input type="text" name="subdistrict" id="subdistrict" class="form-control form-control-md canEdit" placeholder="ตำบล" required disabled />
                </div>
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>เขต/อำเภอ</label>
                  <input type="text" name="District" id="District" class="form-control form-control-md canEdit" placeholder="เขต/อำเภอ" required disabled />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-2">
              </div>

              <div class="col-2">
                <div class=" text-start form-outline mb-3 ">
                  <label>จังหวัด</label>
                  <input type="text" name="Province" id="Province" class="form-control form-control-md canEdit" placeholder="จังหวัด" required disabled />
                </div>
              </div>
              <div class="col-2">
                <div class=" text-start form-outline mb-3 ">
                  <label>รหัสไปรษณีย์</label>
                  <input type="text" name="PostalCode" id="PostalCode" class="form-control form-control-md canEdit" placeholder="รหัสไปรษณีย์" required disabled />
                </div>
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>เลขบัตรประชาชน/คนพิการ</label>
                  <input type="text" name="DisaCardId" id="DisaCardId" class="form-control form-control-md canEdit" placeholder="เลขบัตรประชาชน/คนพิการ" required disabled />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-2">
              </div>


            </div>

            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>ประเภทความพิการ</label>
                  <input type="text" name="disType" id="disType" class="form-control form-control-md canEdit" placeholder="ประเภทความพิการ" required disabled />
                </div>
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>เบอร์โทรศัพท์</label>
                  <input type="text" name="telNum" id="telNum" class="form-control form-control-md canEdit" placeholder="เบอร์โทรศัพท์" required disabled />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>ชั้นปีที่ศึกษา</label>
                  <input type="text" name="EduYear" id="EduYear" class="form-control form-control-md canEdit" placeholder="ชั้นปีที่ศึกษา" required disabled />
                </div>
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>รหัสนักศึกษา</label>
                  <input type="text" name="StuId" id="StuId" class="form-control form-control-md canEdit" placeholder="รหัสนักศึกษา" required disabled />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>คณะ</label>
                  <select class="form-select canEdit" name="fac" id="fac" aria-label="Default select example" disabled>

                  </select>
                </div>
              </div>
              <div class="col-4">
                <label>สาขา</label>
                <select class="form-select canEdit" name="dep" id="dep" aria-label="Default select example" disabled>

                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-8 text-center mt-3 mb-4">
                <a href="formEditSelf.php?id=<?php echo $_GET['id']; ?>" class="btn btn-danger">ย้อนกลับ</a>
                <button id="edit" type="button" class="btn btn-warning" value="edit">แก้ไข</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="mt-4 mb-5">
    <?php require('components/footer.php'); ?>
  </div>

  <script src="ajax/editSelf.js"></script>
</body>

</html>