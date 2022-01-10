<style>
    #navfont {
        font-size: 17px;
    }
    #navout {
        font-size: 17px;
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
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid" style="background-color:rgba(133, 168, 221,1);">
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarLeftAlignExample"
      aria-controls="navbarLeftAlignExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
      >
      <i class="fas fa-phone fa-4x"></i>
    </button>
    <div id="navfont" class="text-start">
      <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
        <div class="row">
          <div class="col-12">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li id="nav_main" class="nav-item">
                <a class="nav-link text-dark" id="main" href="main.php">หน้าหลัก</a>
              </li>
              <?php
                if($s_login_role == "แอดมิน" || $s_login_role == "เจ้าหน้าที่"){
              ?>
              <li class="nav-item">
                <a class="nav-link text-dark" aria-current="page" id="student_information" href="showStudentsInfo.php">ข้อมูลนักศึกษาพิการ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark"  id="manage" href="manageUsers.php">จัดการข้อมูลผู้ใช้</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark"  id="upload" href="form_upload_staff.php">อัพโหลด</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark"  id="download" href="form_download_staff.php">ดาวน์โหลด</a>
              </li>
              <?php
                }
              ?>
              <?php
                if($s_login_role == "นักศึกษา"){
              ?>
              <li class="nav-item">
                <a class="nav-link text-dark"  id="upload" href="form_upload_student.php">อัพโหลด</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark"  id="download" href="form_download_student.php">ดาวน์โหลด</a>
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