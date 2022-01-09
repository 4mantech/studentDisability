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
  <div class="container-fluid">
    <div class="row">
      <div class="col-2">
      </div>
      <div id="profilepic" class=" card col-8 border mt-2">
          <div class="card-header text-center mt-4">
            <img class="border border-dark" src="img/students/potae.jpg" style="width:150px;height:auto;"><br></br>
            <button type="file" class="btn btn-primary btn-sm">แก้ไขรูปภาพ</button>
          </div> 
          <div class="card-body">
            <div class="row">
              <div class="col-2">
              </div>
                <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>ชื่อจริง</label>
                  <input type="text" name="name" id="name" class="form-control form-control-md" placeholder="ชื่อจริง" required/>
                </div>
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>นามสกุล</label>
                  <input type="text" name="surname" id="surname" class="form-control form-control-md" placeholder="นามสกุล" required/>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-2">
              </div>
                <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>ชื่อเล่น</label>
                  <input type="text" name="nickname" id="nickname" class="form-control form-control-md" placeholder="ชื่อเล่น" required/>
                </div>
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>วัน/เดือน/ปีเกิด</label>
                  <input type="date" name="birthday" id="birthday" class="form-control form-control-md" min="1995-01-01" max="2022-12-31" placeholder="วัน/เดือน/ปีเกิด" required/>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-2">
              </div>
                <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>อายุ</label>
                  <input type="text" name="age" id="age" class="form-control form-control-md" placeholder="อายุ" required/>
                </div>
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>ที่อยู่</label>
                  <input type="text" name="address" id="address" class="form-control form-control-md" placeholder="ที่อยู่" required/>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-2">
              </div>
                <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>จังหวัด</label>
                  <input type="text" name="Province" id="Province" class="form-control form-control-md" placeholder="จังหวัด" required/>
                </div>
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>เขต/อำเภอ</label>
                  <input type="text" name="District" id="District" class="form-control form-control-md" placeholder="เขต/อำเภอ" required/>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-2">
              </div>
                <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>รหัสไปรษณีย์</label>
                  <input type="text" name="PostalCode" id="PostalCode" class="form-control form-control-md" placeholder="รหัสไปรษณีย์" required/>
                </div>
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>เลขบัตรประชาชน/คนพิการ</label>
                  <input type="text" name="DisaCardId" id="DisaCardId" class="form-control form-control-md" placeholder="เลขบัตรประชาชน/คนพิการ" required/>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-2">
              </div>
                <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>ประเภทความพิการ</label>
                  <input type="text" name="nickname" id="disType" class="form-control form-control-md" placeholder="ประเภทความพิการ" required/>
                </div>
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>เบอร์โทรศัพท์</label>
                  <input type="text" name="age" id="telNum" class="form-control form-control-md" placeholder="เบอร์โทรศัพท์" required/>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-2">
              </div>
                <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>ชั้นปีที่ศึกษา</label>
                  <input type="text" name="EduYear" id="EduYear" class="form-control form-control-md" placeholder="ชั้นปีที่ศึกษา" required/>
                </div>
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>รหัสนักศึกษา</label>
                  <input type="text" name="StuId" id="StuId" class="form-control form-control-md" placeholder="รหัสนักศึกษา" required/>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-2">
              </div>
                <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>คณะ</label>
                    <select class="form-select" aria-label="Default select example">
                      <option selected disabled>เลือกคณะ</option>
                      <option value="1">คณะวิศวกรรมศาสตร์</option>
                      <option value="2">คณะบริหารธุรกิจ</option>
                      <option value="3">คณะเทคโนโลยีคหกรรมศาสตร์</option>
                      <option value="4">คณะศิลปกรรมศาสตร์</option>
                      <option value="5">คณะเทคโนโลยีการเกษตร</option>
                      <option value="6">คณะครุศาสตร์อุตสาหกรรม</option>
                      <option value="7">คณะสถาปัตยกรรมศาสตร์</option>
                      <option value="8">คณะวิทยาศาสตร์และเทคโนโลยี</option>
                      <option value="9">คณะเทคโนโลยีสื่อสารมวลชน</option>
                      <option value="10">คณะศิลปศาสตร์</option>
                      <option value="11">คณะการแพทย์บูรณาการ</option>
                      <option value="12">คณะพยาบาลศาสตร์</option>
                    </select>
                </div>
              </div>
              <div class="col-4">
                <div class=" text-start form-outline mb-3 ">
                  <label>สาขา</label>
                  <input type="text" name="Major" id="Major" class="form-control form-control-md" placeholder="สาขา" required/>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-2"></div>
                <div class="col-8 text-center mt-3">
                  <a href="showStudentsInfo.php" class="btn btn-danger">ย้อนกลับ</a>
                  <button type="button" class="btn btn-warning">แก้ไข</button>
                </div>
              </div>   
            </div>
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