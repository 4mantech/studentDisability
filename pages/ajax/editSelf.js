var fac = "";
$(document).ready(function () {
  let id = $("#id").val();
  $('#nav_edit_info a').addClass(' active');

  $.ajax({
    type: "GET",
    url: "query/showOneStudent.php",
    data: {
      id: id,
    },
    success: function (data) {
      const new_data = JSON.parse(data).studentObj;
      $("#name").val(new_data[0].firstName);
      $("#surname").val(new_data[0].lastName);
      $("#nickname").val(new_data[0].nickName);
      $("#birthday").val(new_data[0].birthDate);
      $("#address").val(new_data[0].address);
      $("#Province").val(new_data[0].province);
      $("#District").val(new_data[0].district);
      $("#subdistrict").val(new_data[0].subDistrict);
      $("#PostalCode").val(new_data[0].postalCode);
      $("#DisaCardId").val(new_data[0].disabilityId);
      $("#disType").val(new_data[0].disabilityType);
      $("#telNum").val(new_data[0].phone);
      $("#EduYear").val(new_data[0].yearOfEdu);
      $("#StuId").val(new_data[0].userName);
      fac = new_data[0].facultyId;
      let dep = new_data[0].departmentId;
      $("#profileimg").val(new_data[0].imageProfilePath);
      let src1 = "../pages/img/students/" + new_data[0].imageProfilePath;
      $("#profileimg").attr("src", src1);
      showDepartments(fac, dep);
      var dob = new Date(new_data[0].birthDate);
      var month_diff = Date.now() - dob.getTime();
      var age_dt = new Date(month_diff);
      var year = age_dt.getUTCFullYear();
      var age = Math.abs(year - 1970);
      $("#age").val(age);
      showFaculties(fac);
    },
  });
});

const showFaculties = (fac) => {
  $.ajax({
    url: "query/showAllFac.php",
    type: "GET",
    success: function (data) {
      const new_data = JSON.parse(data).facObj;
      let html = "";
      $("#fac").children().remove();
      new_data.forEach((element) => {
        html += `<option value="${element.id}"`;
        if (element.id == fac) {
          html += " selected";
        }
        html += ` >${element.facultyName}</option>`;
      });
      $("#fac").html(html);
    },
  });
};

const showDepartments = (facId, depId) => {
  $.ajax({
    type: "GET",
    url: "query/ShowDepartments.php",
    data: {
      fac: facId,
    },
    success: function (data) {
      const newData = JSON.parse(data).depObj;
      let html = "";
      $("#dep").children().remove();
      newData.forEach((element) => {
        html += ` <option value="${element.id}"`;
        if (element.id == depId && depId != 0) {
          html += " selected";
        }
        html += `>${element.departmentName}</option>`;
        $("#dep").html(html);
      });
    },
  });
};
$("#fac").change(function () {
  fac = $("#fac").val();
  showDepartments(fac, 0);
});
$("#file").change(function () {
  preview_image(event);
});

function preview_image(event) {
  var reader = new FileReader();
  reader.onload = function () {
    var output = document.getElementById("profileimg");
    output.src = reader.result;
  };
  reader.readAsDataURL(event.target.files[0]);
}
const editStudent = () => {
  var form = $("#studentInfo")[0];
  var data = new FormData(form);
  data.append("age", age);
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/editStudent.php",
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (data) {
      if (data == "false") {
        $("#edit").val("editing");
        SoloAlert.alert({
          title: "ผิดพลาด",
          body: "ไม่สามารถแก้ไขได้",
          icon: "error",
          useTransparency: true,
        });
      } else {
        SoloAlert.alert({
          title: "สำเร็จ",
          body: "แก้ไขสำเร็จ",
          icon: "success",
          useTransparency: true,
          onOk: () => {
            location.reload();
          },
        });
      }
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

$("#edit").click(function () {
  $("#edit").removeClass("btn-warning");
  if ($("#edit").val() == "edit") {
    $(".canEdit").prop("disabled", false);
    $("#edit").val("editing");
    $("#edit").addClass("btn-success");
    $("#edit").text("บันทึก");
  } else {
    let name = $("#name").val();
    let surname = $("#surname").val();
    let nickname = $("#nickname").val();
    let birthday = $("#birthday").val();
    let address = $("#address").val();
    let subdistrict = $("#subdistrict").val();
    let district = $("#District").val();
    let province = $("#Province").val();
    let postalcode = $("#PostalCode").val();
    let cardId = $("#DisaCardId").val();
    let EduYear = $("#EduYear").val();
    let StuId = $("#StuId").val();
    let disType = $("#disType").val();
    let telNum = $("#telNum").val();

    if (
      name == "" ||
      surname == "" ||
      nickname == "" ||
      birthday == "" ||
      address == "" ||
      subdistrict == "" ||
      district == "" ||
      province == "" ||
      postalcode == "" ||
      cardId == "" ||
      EduYear == "" ||
      StuId == "" ||
      disType == "" ||
      telNum == ""
    ) {
      if (name == "") {
        $("#name").addClass("border border-danger");
        $("#name").addClass("animate__animated animate__headShake");
      } else {
        $("#name").removeClass("border border-danger");
      }
      if (surname == "") {
        $("#surname").addClass("border border-danger");
        $("#surname").addClass("animate__animated animate__headShake");
      } else {
        $("#surname").removeClass("border border-danger");
      }
      if (nickname == "") {
        $("#nickname").addClass("border border-danger");
        $("#nickname").addClass("animate__animated animate__headShake");
      } else {
        $("#nickname").removeClass("border border-danger");
      }
      if (birthday == "") {
        $("#birthday").addClass("border border-danger");
        $("#birthday").addClass("animate__animated animate__headShake");
      } else {
        $("#birthday").removeClass("border border-danger");
      }
      if (address == "") {
        $("#address").addClass("border border-danger");
        $("#address").addClass("animate__animated animate__headShake");
      } else {
        $("#address").removeClass("border border-danger");
      }
      if (subdistrict == "") {
        $("#subdistrict").addClass("border border-danger");
        $("#subdistrict").addClass("animate__animated animate__headShake");
      } else {
        $("#subdistrict").removeClass("border border-danger");
      }
      if (district == "") {
        $("#District").addClass("border border-danger");
        $("#District").addClass("animate__animated animate__headShake");
      } else {
        $("#District").removeClass("border border-danger");
      }
      if (province == "") {
        $("#Province").addClass("border border-danger");
        $("#Province").addClass("animate__animated animate__headShake");
      } else {
        $("#Province").removeClass("border border-danger");
      }
      if (postalcode == "") {
        $("#PostalCode").addClass("border border-danger");
        $("#PostalCode").addClass("animate__animated animate__headShake");
      } else {
        $("#PostalCode").removeClass("border border-danger");
      }
      if (cardId == "") {
        $("#DisaCardId").addClass("border border-danger");
        $("#DisaCardId").addClass("animate__animated animate__headShake");
      } else {
        $("#DisaCardId").removeClass("border border-danger");
      }
      if (EduYear == "") {
        $("#EduYear").addClass("border border-danger");
        $("#EduYear").addClass("animate__animated animate__headShake");
      } else {
        $("#EduYear").removeClass("border border-danger");
      }
      if (StuId == "") {
        $("#StuId").addClass("border border-danger");
        $("#StuId").addClass("animate__animated animate__headShake");
      } else {
        $("#StuId").removeClass("border border-danger");
      }
      if (disType == "") {
        $("#disType").addClass("border border-danger");
        $("#disType").addClass("animate__animated animate__headShake");
      } else {
        $("#disType").removeClass("border border-danger");
      }
      if (telNum == "") {
        $("#telNum").addClass("border border-danger");
        $("#telNum").addClass("animate__animated animate__headShake");
      } else {
        $("#telNum").removeClass("border border-danger");
      }
      setTimeout(function () {
        $(":input").removeClass("animate__animated animate__headShake");
      }, 300);
    } else {
      $("#edit").val("edit");
      editStudent();
    }
  }
});

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

$("#nickname").keyup(function () {
  if ($("#nickname").val() != "") {
    $("#nickname").removeClass("animate__animated animate__headShake");
  }
});

$("#birthday").keyup(function () {
  if ($("#birthday").val() != "") {
    $("#birthday").removeClass("animate__animated animate__headShake");
  }
});

$("#address").keyup(function () {
  if ($("#address").val() != "") {
    $("#address").removeClass("animate__animated animate__headShake");
  }
});

$("#subdistrict").keyup(function () {
  if ($("#subdistrict").val() != "") {
    $("#subdistrict").removeClass("animate__animated animate__headShake");
  }
});

$("#District").keyup(function () {
  if ($("#District").val() != "") {
    $("#District").removeClass("animate__animated animate__headShake");
  }
});

$("#Province").keyup(function () {
  if ($("#Province").val() != "") {
    $("#Province").removeClass("animate__animated animate__headShake");
  }
});

$("#PostalCode").keyup(function () {
  if ($("#PostalCode").val() != "") {
    $("#PostalCode").removeClass("animate__animated animate__headShake");
  }
});

$("#DisaCardId").keyup(function () {
  if ($("#DisaCardId").val() != "") {
    $("#DisaCardId").removeClass("animate__animated animate__headShake");
  }
});

$("#EduYear").keyup(function () {
  if ($("#EduYear").val() != "") {
    $("#EduYear").removeClass("animate__animated animate__headShake");
  }
});

$("#StuId").keyup(function () {
  if ($("#StuId").val() != "") {
    $("#StuId").removeClass("animate__animated animate__headShake");
  }
});

$("#disType").keyup(function () {
  if ($("#disType").val() != "") {
    $("#disType").removeClass("animate__animated animate__headShake");
  }
});

$("#telNum").keyup(function () {
  if ($("#telNum").val() != "") {
    $("#telNum").removeClass("animate__animated animate__headShake");
  }
});
