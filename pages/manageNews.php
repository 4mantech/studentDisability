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
  if ($_SESSION['role'] != "admin") {
    session_destroy();
    header("Location:../main.php");
  }
  ?>
  <link rel="stylesheet" href="../assets/css/styleMain.css">
</head>
<style>
  #addNews {
    position: relative;
    left: 94%;
  }
  .modal-dialog {
    position: relative;
    display: table;
    overflow-y: auto;    
    overflow-x: auto;
    width: auto;
    min-width: 300px;   
}
</style>

<body>
  <?php require('components/navbar.php'); ?>

  <div class="modal fade" id="modalNews" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">ข่าวสารอาหารแห้ง</h5>
        </div>
        <div class="modal-body text-center">
          <img id="biggerNews" class="border" style="width: 848px; height: 410px;">
          <div><br></div>
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" onclick="javascript:$('#modalNews').modal('hide');">ย้อนกลับ</button>
          </div>
        </div>
      </div>
    </div>
  </div>

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
  <div class="my-5">
    <br><br><br><br>
    <?php require('components/footer.php'); ?>
  </div>
  <script src="ajax/showNews.js"></script>
</body>

</html>