$(document).ready(function () {

    $("#birthday").change(function () {
      const dob = new Date($("#birthday").val());
      var month_diff = Date.now() - dob.getTime();
      var age_dt = new Date(month_diff);
      var year = age_dt.getUTCFullYear();
      var age = Math.abs(year - 1970);
      $("#age").val(age);
  
      $("#submit").click(function () {
                // Get form
                var form = $('#myform')[0];
                // FormData object 
                var data = new FormData(form);
        $.ajax({
          type: "POST",
          enctype: 'multipart/form-data',
          url: "query/addUser.php",
          data: data,
          processData: false,
          contentType: false,
          cache: false,
          success:function(data){
            if(data == "false"){
              SoloAlert.alert({
                title:"ผิดพลาด",
                body:"ไม่สามารถเพิ่มผู้ใช้งานได้",
                icon: "error",
                useTransparency: true,
              });
            }else{
              SoloAlert.alert({
                title:"สำเร็จ",
                body:"เพิ่มผู้ใช้งานเรียบร้อยแล้ว",
                icon: "success",
                useTransparency: true,
                onOk : ()=>{window.location.href = `manageUsers.php`}
              });
            }
          }
        })
      })
    });
  });
  