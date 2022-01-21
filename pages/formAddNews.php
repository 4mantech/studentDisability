<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>เพิ่มข่าว</title>
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

<body>
  <?php require('components/navbar.php'); ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-3">
      </div>
      <div class=" col-6 mt-2">
        <h4>เพิ่มข่าวสาร</h4>
        <form method="POST" enctype="multipart/form-data" id="myform">
          <div class="card">
            <div class="card-body">
              <div class="mt-4">
                <div class="row">
                  <div class="col-3">
                    <label style="font-size:20px;" class="card-title">ชื่อข่าวสาร</label>
                  </div>
                  <div class="col-6 mb-2">
                    <input class="form-control mb-2" type="text" name="imageName" id="imageName" placeholder="กรอกชื่อข่าวสาร">
                    <div class="text-center mt-2">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-3">
                    <label style="font-size:20px;" class="card-title">วันที่เริ่มแสดงข่าวสาร</label>
                  </div>
                  <div class="col-6 form-group col-md-3 mb-2">
                    <input class="form-control" type="date" name="startDate" id="startDate">
                    <div class="text-center mt-1">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-3 ">
                    <label style="font-size:20px;" class="card-title">วันที่สิ้นสุดแสดงข่าวสาร</label>
                  </div>
                  <div class="col-6 form-group col-md-3 mb-2">
                    <input class="form-control mb-2" type="date" name="endDate" id="endDate">
                    <div class="text-center mt-1">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-3 mt-2">
                    <label style="font-size:20px;" class="card-title">อัพโหลดรูปภาพข่าวสาร</label>
                  </div>
                  <div class="col-6 mb-4">
                    <input class="form-control" name="file" type="file" id="formFile" accept="image/jpg, image/jpeg, image/png">
                  </div>
                </div>
                <div class="row">
                  <div class="text-center mt-4 mb-4">
                    <a href="manageNews.php" class="btn btn-danger">ย้อนกลับ</a>
                    <button type="button" id="submit" class="btn btn-success">บันทึก</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="mt-4">
    <?php require('components/footer.php'); ?>
  </div>
  <script src="ajax/addNews.js"></script>
</body>

</html>