<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>จัดการผู้ใช้งาน</title>
  <?php
  require('../bootstrap5CSS.php');
  require('../bootstrap5JS.php');
  require('query/checkLogin.php');
  if ($_SESSION['role'] != "admin") {
    session_destroy();
    header("Location:../main.php");
  }
  ?>
  <link rel="stylesheet" href="../assets/css/styleMain.css">
</head>
<style>
  #addUser {
    position: relative;
    left: 92%;
  }
</style>

<body>
 <!-- Modal -->
 <div class="modal fade" id="changePassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="changePasswordLabelLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="changePasswordLabelLabel">เปลี่ยนรหัสผ่านสตาฟ</h5>
        </div>
        <div class="modal-body">

          <div class="col">
            <div class="input-group has-validation">
              <span class="input-group-text" id="inputGroupPrepend">รหัสผ่านใหม่</span>
              <input type="hidden" id="studentId">
              <input type="password" id="newPassword" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
               กรุณากรอกรหัสผ่าน
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="cancelModal" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
          <button type="button" id="savePassword" class="btn btn-success">บันทึก</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->

  <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขข้อมูลเจ้าหน้าที่</h5>
        </div>
        <div class="modal-body">
          <div class=" col-12 mt-2 mb-2">
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data" id="myform">
                <div class="row">
                  <div class="col-2">
                  </div>
                  <div class="col-4">
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
                      <label>ชื่อเล่น</label>
                      <input type="text" name="nickname" id="nickname" class="form-control form-control-md" placeholder="ชื่อเล่น" required />
                    </div>
                  </div>

                  <div class="col-4">
                    <div class=" text-start form-outline mb-3 ">
                      <label>วัน/เดือน/ปีเกิด</label>
                      <input type="date" name="birthday" id="birthday" class="form-control form-control-md" min="1995-01-01" max="2022-12-31" placeholder="วัน/เดือน/ปีเกิด" required />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-2">
                  </div>
                  <div class="col-4">
                    <div class=" text-start form-outline mb-3 ">
                      <label>อายุ</label>
                      <input type="text" name="age" id="age" class="form-control form-control-md" placeholder="อายุ" disabled />
                    </div>
                  </div>
                  <div class="col-4">
                    <div class=" text-start form-outline mb-3 ">
                      <label>รหัสประจำตัวสถานศึกษา</label>
                      <input type="text" name="StuId" id="StuId" class="form-control form-control-md" placeholder="รหัสประจำตัวสถานศึกษา" required />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-2">
                  </div>
                  <div class="col-4">
                    <div class=" text-start form-outline mb-3 ">
                      <label>เลขบัตรประชาชน</label>
                      <input type="text" name="DisaCardId" id="DisaCardId" class="form-control form-control-md" placeholder="เลขบัตรประชาชน" required />
                    </div>
                  </div>
                  <div class="col-4">
                    <div class=" text-start form-outline mb-3 ">
                      <label>เบอร์โทรศัพท์</label>
                      <input type="text" name="telNum" id="telNum" class="form-control form-control-md" placeholder="เบอร์โทรศัพท์" required />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-2">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="closemodal" data-mdb-dismiss="modal" onclick="$('#editUserModal').modal('hide');" class="btn btn-danger">ยกเลิก</button>
          <button type="button" id="confirmAdd" class="btn btn-success">ยืนยัน</button>
        </div>
      </div>
    </div>
  </div>

  <?php require('components/navbar.php'); ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-2">
      </div>
      <div class=" col-8 mt-2">
        <h4>จัดการข้อมูลผู้ใช้</h4>
        <a href="form_add_user.php" id="addUser" type="button" class="btn btn-success mb-3"> เพิ่มผู้ใช้งาน </a>
        <div class="row">
          <table class="table table-striped" id="tableUsers">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">รหัสประจำตัว</th>
                <th scope="col">ชื่อ</th>
                <th scope="col">ตำแหน่ง</th>
                <th scope="col" class="text-center">ACTION</th>
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
    <br><br><br><br><br>
    <?php require('components/footer.php'); ?>
  </div>
  <script src="ajax/manageUsers.js"></script>
  <script src="ajax/changePassword.js"></script>
</body>

</html>