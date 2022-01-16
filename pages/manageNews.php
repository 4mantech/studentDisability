<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>หน้าหลัก</title>
  <?php
  require('../bootstrap5CSS.php');
  require('../bootstrap5JS.php');
  require('query/checkLogin.php');
  ?>
  <link rel="stylesheet" href="../assets/css/styleMain.css">
</head>
<style>
  #addNews {
    position: relative;
    left: 94%;
  }
</style>

<body>
  <?php require('components/navbar.php'); ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-2">
      </div>
      <div class=" col-8 mt-2">
        <h4>จัดการข่าว</h4>
        <a href="formAddNews.php" id="addNews" type="button" class="btn btn-success mb-3">เพิ่มข่าว</a>
        <div class="row">
          <table class="table table-striped" id="tableNews">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">รูปภาพตัวอย่าง</th>
                <th scope="col">ชื่อข่าว</th>
                <th scope="col">วันที่เริ่มต้น</th>
                <th scope="col">วันที่สิ้นสุด</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="tbody">

            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
  <div class="mt-5">
    <br><br><br><br>
    <?php require('components/footer.php'); ?>
  </div>
  <script src="ajax/showNews.js"></script>
</body>

</html>