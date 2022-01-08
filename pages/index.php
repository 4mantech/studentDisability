<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>โปเต้ No.1</title>
  <?php 
  require('../bootstrap5CSS.php'); 
  require('../bootstrap5JS.php'); 
  ?>
</head>
<body>
<form id="formLogin" enctype="multipart/form-data" method="POST">
  <input type="text" name="username" id="username" placeholder="Username">
  <input type="text" name="password" id="password" placeholder="Password">
  <input type="button" id="submit" value="Login">
  </form>
</div>

</div>
  <style>
    body {
      background-image: url("img/bg25.jpg");
  }
  </style>
<?php // require('components/footer.php'); ?>
<script src="ajax/login.js"></script>
</body>
</html>