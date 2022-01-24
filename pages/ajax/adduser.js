$("#name").keyup(function () {
  if ($("#name").val() != "") {
    $("#name").removeClass("animate__animated animate__headShake");
  }
});
$("#surname").keyup(function () {
  if ($("#surname").val() != "") {
    $("#surname").removeClass("animate__animated animate__headShake");
  }
});
$("#birthday").keyup(function () {
  if ($("#birthday").val() != "") {
    $("#birthday").removeClass("animate__animated animate__headShake");
  }
});
$("#StuId").keyup(function () {
  if ($("#StuId").val() != "") {
    $("#StuId").removeClass("animate__animated animate__headShake");
  }
});
$("#DisaCardId").keyup(function () {
  if ($("#DisaCardId").val() != "") {
    $("#DisaCardId").removeClass("animate__animated animate__headShake");
  }
});
$("#telNum").keyup(function () {
  if ($("#telNum").val() != "") {
    $("#telNum").removeClass("animate__animated animate__headShake");
  }
});
$("#nickname").keyup(function () {
  if ($("#nickname").val() != "") {
    $("#nickname").removeClass("animate__animated animate__headShake");
  }
});

$("#birthday").change(function () {
  const dob = new Date($("#birthday").val());
  var month_diff = Date.now() - dob.getTime();
  var age_dt = new Date(month_diff);
  var year = age_dt.getUTCFullYear();
  var age = Math.abs(year - 1970);
  $("#age").val(age);
});

$("#submit").click(function () {
  let name = $("#name").val();
  let surname = $("#surname").val();
  let birthday = $("#birthday").val();
  let StuId = $("#StuId").val();
  let DisaCardId = $("#DisaCardId").val();
  let telNum = $("#telNum").val();
  let nickname = $("#nickname").val();
  // Get form
  var form = $("#myform")[0];
  // FormData object
  var data = new FormData(form);

  setTimeout(function () {
    $(":input").removeClass("animate__animated animate__headShake");
  }, 500);
  if (
    name == "" ||
    surname == "" ||
    birthday == "" ||
    birthday == "" ||
    StuId == "" ||
    DisaCardId == "" ||
    telNum == "" ||
    nickname == ""
  ) {
    if (name == "") {
      $("#name").addClass("animate__animated animate__headShake");
    }
    if (surname == "") {
      $("#surname").addClass("animate__animated animate__headShake");
    }
    if (birthday == "") {
      $("#birthday").addClass("animate__animated animate__headShake");
    }
    if (StuId == "") {
      $("#StuId").addClass("animate__animated animate__headShake");
    }
    if (DisaCardId == "") {
      $("#DisaCardId").addClass("animate__animated animate__headShake");
    }
    if (telNum == "") {
      $("#telNum").addClass("animate__animated animate__headShake");
    }
    if (nickname == "") {
      $("#nickname").addClass("animate__animated animate__headShake");
    }
  } else {
    $.ajax({
      type: "POST",
      enctype: "multipart/form-data",
      url: "query/addUser.php",
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (data) {
        if (data == "false") {
          SoloAlert.alert({
            title: "ผิดพลาด",
            body: "ไม่สามารถเพิ่มผู้ใช้งานได้",
            icon: "error",
            useTransparency: true,
          });
        } else {
          SoloAlert.alert({
            title: "สำเร็จ",
            body: "เพิ่มผู้ใช้งานเรียบร้อยแล้ว",
            icon: "success",
            useTransparency: true,
            onOk: () => {
              window.location.href = `manageUsers.php`;
            },
          });
        }
      },
    });
  }
});

