
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
  #newsslide {
    position: relative;
    left:10%;
  }
  .bg-fah{
  background-color:#85a8dd!important;
}
</style>
<body>
  <input type="hidden" name="notice" id="notice" value="<?php echo $_SESSION['notice']; ?>">
  <?php
   if($_SESSION['notice'] == "1"){
    $_SESSION['notice'] = "0";
  }
  ?>
<?php require('components/navbar.php'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-2">
    </div>
    <div id="newsslide" class=" col-8 mt-2">
      <?php require('components/newsSlide.php'); ?>
    </div>
  </div>
</div>
<div class="mt-4">
  <?php require('components/footer.php'); ?>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-fah">
        <h5 class="modal-title" id="staticBackdropLabel">ท่านมีเอกสารที่ยังไม่ได้ทำการ Upload</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h1>กรุณา Upload เอกสารให้ครบถ้วน น น น น น</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">รับทราบ</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    if($("#notice").val() == "1"){
      $("#staticBackdrop").modal("show")
    }
  })
</script>
</body>
</html>