var id = $("#id").val();

const ShowOneUser = (id) => {
  $.ajax({
    type: "GET",
    url: "query/showEditUser.php",
    data: {
      id: id,
    },
    success: function (data) {
      var new_data = JSON.parse(data).userObj;
      $("#name").val(new_data[0]["firstName"]);
      $("#surname").val(new_data[0]["lastName"]);
      $("#birthday").val(new_data[0]["birthDate"]);
      $("#telNum").val(new_data[0]["phone"]);
      $("#StuId").val(new_data[0]["userName"]);
      $("#subdistrict").val(new_data[0]["subDistrict"]);
      $("#DisaCardId").val(new_data[0]["idCardNumber"]);
      $("#nickname").val(new_data[0]["nickName"]);
      $("#telNum").val(new_data[0]["phone"]);
      var dob = new Date(new_data[0]["birthDate"]);
      var month_diff = Date.now() - dob.getTime();
      var age_dt = new Date(month_diff);
      var year = age_dt.getUTCFullYear();
      var age = Math.abs(year - 1970);
      $("#age").val(age);
    },
  });
};

$("#birthday").change(function () {
  const dob = new Date($("#birthday").val());
  var month_diff = Date.now() - dob.getTime();
  var age_dt = new Date(month_diff);
  var year = age_dt.getUTCFullYear();
  var age = Math.abs(year - 1970);
  $("#age").val(age);
});

$("#submit").click(function () {
  var form = $("#myform")[0];
  var data = new FormData(form);
  let age = $("#age").val();
  data.append("age", age);
  var name = $("#name").val();
  let surname = $("#surname").val();
  let nickname = $("#nickname").val();
  let birthday = $("#birthday").val();
  let stuId = $("#StuId").val();
  let disId = $("#DisaCardId").val();
  let tel = $("#telNum").val();

  if (
    name == "" ||
    surname == "" ||
    nickname == "" ||
    birthday == "" ||
    stuId == "" ||
    disId == "" ||
    tel == ""
  ) {
    if (name == "") {
      $("#name").addClass("border border-danger");
    } else {
      $("#name").removeClass("border border-danger");
    }
    if (surname == "") {
      $("#surname").addClass("border border-danger");
    } else {
      $("#surname").removeClass("border border-danger");
    }
    if (nickname == "") {
      $("#nickname").addClass("border border-danger");
    } else {
      $("#nickname").removeClass("border border-danger");
    }
    if (birthday == "") {
      $("#birthday").addClass("border border-danger");
    } else {
      $("#birthday").removeClass("border border-danger");
    }
    if (stuId == "") {
      $("#StuId").addClass("border border-danger");
    } else {
      $("#StuId").removeClass("border border-danger");
    }
    if (disId == "") {
      $("#DisaCardId").addClass("border border-danger");
    } else {
      $("#DisaCardId").removeClass("border border-danger");
    }
    if (tel == "") {
      $("#telNum").addClass("border border-danger");
    } else {
      $("#telNum").removeClass("border border-danger");
    }
  } else {
    $.ajax({
      type: "POST",
      enctype: "multipart/form-data",
      url: "query/editUser.php",
      processData: false,
      contentType: false,
      cache: false,
      data: data,
      success: function (data) {
        if (data == "true") {
          SoloAlert.alert({
            title: "สำเร็จ",
            body: "แก้ไขสำเร็จ",
            icon: "success",
            useTransparency: true,
            onOk: () => {
              location.reload();
            },
          });
        } else {
          SoloAlert.alert({
            title: "ผิดพลาด",
            body: "ไม่สามารถแก้ไขได้",
            icon: "error",
            useTransparency: true,
          });
        }
      },
    });
  }
});

$('#name').keyup(function() {
  if ($(this).val() == "") {
      $('#name').addClass('border border-danger');
  } else {
      $('#name').removeClass('border border-danger');
  }
});

$('#surname').keyup(function() {
  if ($(this).val() == "") {
      $('#surname').addClass('border border-danger');
  } else {
      $('#surname').removeClass('border border-danger');
  }
});

$('#nickname').keyup(function() {
  if ($(this).val() == "") {
      $('#nickname').addClass('border border-danger');
  } else {
      $('#nickname').removeClass('border border-danger');
  }
});

$('#birthday').keyup(function() {
  if ($(this).val() == "") {
      $('#birthday').addClass('border border-danger');
  } else {
      $('#birthday').removeClass('border border-danger');
  }
});

$('#StuId').keyup(function() {
  if ($(this).val() == "") {
      $('#StuId').addClass('border border-danger');
  } else {
      $('#StuId').removeClass('border border-danger');
  }
});

$('#DisaCardId').keyup(function() {
  if ($(this).val() == "") {
      $('#DisaCardId').addClass('border border-danger');
  } else {
      $('#DisaCardId').removeClass('border border-danger');
  }
});

$('#telNum').keyup(function() {
  if ($(this).val() == "") {
      $('#telNum').addClass('border border-danger');
  } else {
      $('#telNum').removeClass('border border-danger');
  }
});


$(document).ready(function () {
  ShowOneUser(id);
});
