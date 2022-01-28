<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ระบบจัดการข้อมูลนักศึกษาของศูนย์บริการนักศึกษาพิการในมหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี</title>
  <?php
  require('../bootstrap5CSS.php');
  require('../bootstrap5JS.php');
  session_start();
  if (isset($_SESSION['login_id'])) {
    header("location:main.php");
  }
  ?>
</head>
<style>
  body {
    background-image: url("img/bg25.jpg");
  }
  label {
    text-align: left;
  }
</style>

<body>
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" id="card" style="border-radius: 1rem; margin-top: 10%; opacity:88%">
          <!-- <div class="card shadow-2-strong" id="card" style="border-radius: 1rem; margin-top: 10%; opacity:88%"> -->
          <div class="card-body p-5 text-center">
            <img src="img/logo.png" class="animate__animated animate__slideInDown" style="width:150px; height:150px;">
            <h4 class="mb-5">ระบบจัดการข้อมูลนักศึกษาของศูนย์บริการนักศึกษาพิการในมหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี</h4>
            <form action="query/login.php" method="POST">
              <div class=" text-start form-outline mb-3 ">
                <label>ชื่อผู้ใช้งาน</label>
                <input type="text" name="username" id="username" class="form-control form-control-md" placeholder="Username" required />
              </div>
              <div class="text-start form-outline ">
                <label>รหัสผ่าน</label>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control form-control-md" required />
              </div><br>
              <button class="btn btn-primary btn-lg btn-block mt-2" id="submit" type="submit" value="Login">เข้าสู่ระบบ</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
<script>
  var myParam = location.search.split('status=')[1]
  if (myParam == 0) {
    SoloAlert.alert({
      title: "ผิดพลาด",
      body: "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง",
      icon: "error",
      useTransparency: true,
    });
  }
</script>
</html>