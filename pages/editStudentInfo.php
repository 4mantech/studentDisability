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
</head>
<style>
  body {
    background-image: url('img/bgMain.png');
  }
</style>
<body>
<?php require('components/navbar.php'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-2">
    </div>
    <div class=" col-8 mt-2 border" >
        
    </div>
  </div>
</div>
<div class="mt-4">
  <?php require('components/footer.php'); ?>
</div>
</body>
</html>