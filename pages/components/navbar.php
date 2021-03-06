<?php 
$urlEdit = "formEditUser.php?id=";
if($s_login_role == "นักศึกษา"){
  $urlEdit = "formEditSelf.php?id=";
}

?>
<style>
    #navfont {
        font-size: 17px;
    }
    #navout {
        font-size: 17px;
    }
    .navbar{
      padding-top:0px
    }    
</style>

<nav class="navbar" style="background-color:white;">
  <div class="container-fluid">
    <a class="navbar-brand" href="../pages/main.php">
        <img src="img/banner.png" style="height:125px; width:auto;"> 
    </a>
    <h6 class=" text-dark">ยินดีต้อนรับคุณ : <?php echo $s_login_username; ?></h6>
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid" style="background-color:rgba(133, 168, 221,1);">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLeftAlignExample" aria-controls="navbarLeftAlignExample" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navfont" class="text-start">
      <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
        <div class="row">
          <div class="col-12">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li id="nav_main" class="nav-item">
                <a class="nav-link" id="main" href="main.php">หน้าหลัก</a>
              </li>
              <li id="nav_edit_info" class="nav-item">
                <a class="nav-link" id="editInfo" href="<?php echo $urlEdit.$_SESSION['login_id']; ?>">ข้อมูลส่วนตัว</a>
              </li>
              <?php
                if($s_login_role == "แอดมิน"){
              ?>
              <li id="manage_user" class="nav-item">
                <a class="nav-link"  id="manage" href="manageUsers.php">จัดการข้อมูลเจ้าหน้าที่</a>
              </li>
              <li id="manage_fac" class="nav-item">
                <a class="nav-link"  id="manageFac" href="manageFac.php">จัดการคณะ</a>
              </li>
              <?php
                }
                if($s_login_role == "เจ้าหน้าที่"){
              ?>
             <li id="nav_student_info" class="nav-item">
                <a class="nav-link" aria-current="page" id="student_information" href="showStudentsInfo.php">ข้อมูลนักศึกษาพิการ</a>
              </li>
              <li id="nav_upload" class="nav-item">
                <a class="nav-link"  id="upload" href="form_upload_staff.php">อัพโหลดเอกสาร</a>
              </li>
              <li id="manage_news" class="nav-item">
                <a class="nav-link"  id="manageNews" href="manageNews.php">จัดการข่าว</a>
              </li>
              <?php
                }
                if($s_login_role == "นักศึกษา"){
              ?>
                 <li id="nav_upload_student" class="nav-item">
                <a class="nav-link"  id="upload" href="form_upload_student.php?id=<?php echo $_SESSION['login_id']; ?>">อัพโหลดเอกสาร</a>
              </li>
              <li id="nav_download_student"class="nav-item">
                <a class="nav-link"  id="download" href="form_download_student.php">ดาวน์โหลดเอกสาร</a>
              </li>
              <?php 
                }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div id="navout" class="nav-item navbar-nav" aria-current="page" >
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <p class="nav-link text-dark"><?php echo $s_login_role; ?></p>
              </li>
              <li class="nav-item">
      <a class="nav-link text-dark"  href="query/logout.php">ออกจากระบบ</a>
      </li>
</ul>
    </div>
  </div>
</nav>
