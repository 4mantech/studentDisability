$(document).ready(function () {
  var file = "";
  var startDate = "";
  var endDate = "";
  var name = "";

  $("#imageName").keyup(function () {
    if ($(this).val() == "") {
      $(this).addClass("border border-danger");
    } else {
      $(this).removeClass("border border-danger");
    }
  });

  $("#formFile").change(function () {
    if ($(this).val() == "") {
      $(this).addClass("border border-danger");
    } else {
      $(this).removeClass("border border-danger");
    }
  });

  $("#startDate").change(function () {
    if ($(this).val() == "") {
      $(this).addClass("border border-danger");
    } else {
      $(this).removeClass("border border-danger");
    }
  });

  $("#endDate").change(function () {
    if ($(this).val() == "") {
      $(this).addClass("border border-danger");
    } else {
      $(this).removeClass("border border-danger");
    }
  });

  $("#submit").click(function () {
    name = $("#imageName").val();
    file = $("#formFile").val();
    startDate = $("#startDate").val();
    endDate = $("#endDate").val();

    if (name == "" || endDate == "" || startDate == "" || file == "") {
      if (name == "") {
        $("#imageName").addClass("border border-danger");
      }
      if (endDate == "") {
        $("#endDate").addClass("border border-danger");
      }
      if (startDate == "") {
        $("#startDate").addClass("border border-danger");
      }
      if (file == "") {
        $("#formFile").addClass("border border-danger");
      }
    } else {
      var form = $("#myform")[0];
      var data = new FormData(form);
      $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: "query/addNews.php",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
          if (data == "false") {
            SoloAlert.alert({
              title: "ผิดพลาด",
              body: "ไม่สามารถเพิ่มข่าวได้",
              icon: "error",
              useTransparency: true,
            });
          } else {
            SoloAlert.alert({
              title: "สำเร็จ",
              body: "เพิ่มข่าวสารเรียบร้อยแล้ว",
              icon: "success",
              useTransparency: true,
              onOk: () => {
                window.location.href = "manageNews.php";
              },
            });
          }
        },
      });
    }
  });
});
