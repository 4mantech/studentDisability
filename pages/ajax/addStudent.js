var fac = 0;
var file = $("#file")[0].files;

const showFaculties = () => {
  $.ajax({
    url: "query/showAllFac.php",
    type: "GET",
    success: function (data) {
      const new_data = JSON.parse(data).facObj;
      $("#fac").children().remove();
      $("#fac").html('<option value="0"></option>');
      new_data.forEach((element) => {
        $("#fac").append(`
        <option value="${element.id}">${element.facultyName}</option>
        `);
      });
    },
  });
};

const showProvinces = () => {
  $.ajax({
    type: "get",
    url: "query/showProvinces.php",
    success: function (response) {
      const { provincesObj } = JSON.parse(response);
      showDistricts(provincesObj[0].id);
      provincesObj.forEach((element) => {
        $("#Province").append(`
          <option value="${element.id}">${element.name_in_thai}</option>
          `);
      });
    },
  });
};

const showDistricts = (provinceId) => {
  $.ajax({
    type: "get",
    data: {
      provinceId,
    },
    url: "query/showDistricts.php",
    success: function (response) {
      const { districtsObj } = JSON.parse(response);
      districtsObj.forEach((element) => {
        $("#District").append(`
          <option value="${element.id}">${element.name_in_thai}</option>
          `);
      });
      showSubDistricts(districtsObj[0].id);
    },
  });
};

const showSubDistricts = (districtId) => {
  $.ajax({
    type: "get",
    data: {
      districtId,
    },
    url: "query/showSubDistricts.php",
    success: function (response) {
      const { subDistrictsObj } = JSON.parse(response);
      subDistrictsObj.forEach((element) => {
        $("#subdistrict").append(`
          <option value="${element.id}">${element.name_in_thai}</option>
          `);
      });
      $("#PostalCode").val(subDistrictsObj[0].zip_code);
      getZipCode = subDistrictsObj;
    },
  });
};

const showDepartments = (facId) => {
  $.ajax({
    url: "query/showDepartments.php",
    type: "GET",
    data: {
      fac: facId,
    },
    success: function (data) {
      let new_data = JSON.parse(data).depObj;
      $("#dep").children().remove();
      $("#dep").html('<option value="0"></option>');
      new_data.forEach((element) => {
        $("#dep").append(`
        <option value="${element.id}">${element.departmentName}</option>
        `);
      });
    },
  });
};

const callAjax = () => {
  file = $("#file")[0].files;
  formdata = new FormData();
  formdata.append("prefix", $("#prefix").val());
  formdata.append("name", $("#name").val());
  formdata.append("surname", $("#surname").val());
  formdata.append("nickname", $("#nickname").val());
  formdata.append("birthday", $("#birthday").val());
  formdata.append("address", $("#address").val());
  formdata.append("subDistrict", $("#subdistrict").val());
  formdata.append("PostalCode", $("#PostalCode").val());
  formdata.append("DisaCardId", $("#DisaCardId").val());
  formdata.append("disType", $("#disType").val());
  formdata.append("age", $("#age").val());
  formdata.append("telNum", $("#telNum").val());
  formdata.append("EduYear", $("#EduYear").val());
  formdata.append("StuId", $("#StuId").val());
  formdata.append("fac", $("#fac").val());
  formdata.append("dep", $("#dep").val());
  formdata.append("file", file[0]);
  $.ajax({
    type: "post",
    url: "query/addStudent.php",
    data: formdata,
    contentType: false,
    processData: false,
    success: function (data) {
      if (data == "false") {
        SoloAlert.alert({
          title: "?????????????????????",
          body: "???????????????????????????????????????????????????????????????????????????",
          icon: "error",
          useTransparency: true,
        });
      } else {
        SoloAlert.alert({
          title: "??????????????????",
          body: "??????????????????????????????????????????????????????????????????????????????",
          icon: "success",
          useTransparency: true,
          onOk: () => {
            window.location.href = "showStudentsInfo.php";
          },
        });
      }
    },
  });
};
$("#fac").change(function () {
  fac = $("#fac").val();
  if (fac != 0) {
    $("#dep").prop("disabled", false);
  } else {
    $("#dep").prop("disabled", true);
  }
  showDepartments(fac);
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
$("#birthday").change(function () {
  const dob = new Date($("#birthday").val());
  var month_diff = Date.now() - dob.getTime();
  var age_dt = new Date(month_diff);
  var year = age_dt.getUTCFullYear();
  var age = Math.abs(year - 1970);
  $("#age").val(age);
});
$(document).ready(function () {
  showProvinces();
  $("#nav_student_info a").addClass(" active");
  showFaculties();
  $("#dep").prop("disabled", true);
});
$("#name").keyup(function () {
  if ($("#name").val() != "") {
    $("#name").removeClass("is-invalid");
  }
});
$("#surname").keyup(function () {
  if ($("#surname").val() != "") {
    $("#surname").removeClass("is-invalid");
  }
});
$("#nickname").keyup(function () {
  if ($("#nickname").val() != "") {
    $("#nickname").removeClass("is-invalid");
  }
});
$("#birthday").keyup(function () {
  if ($("#birthday").val() != "") {
    $("#birthday").removeClass("is-invalid");
  }
});
$("#address").keyup(function () {
  if ($("#address").val() != "") {
    $("#address").removeClass("is-invalid");
  }
});
$("#subdistrict").keyup(function () {
  if ($("#subdistrict").val() != "") {
    $("#subdistrict").removeClass("is-invalid");
  }
});
$("#District").keyup(function () {
  if ($("#District").val() != "") {
    $("#District").removeClass("is-invalid");
  }
});
$("#Province").keyup(function () {
  if ($("#Province").val() != "") {
    $("#Province").removeClass("is-invalid");
  }
});
$("#PostalCode").keyup(function () {
  if ($("#PostalCode").val() != "") {
    $("#PostalCode").removeClass("is-invalid");
  }
});
$("#DisaCardId").keyup(function () {
  if ($("#DisaCardId").val() != "") {
    $("#DisaCardId").removeClass("is-invalid");
  }
});
$("#disType").keyup(function () {
  if ($("#disType").val() != "") {
    $("#disType").removeClass("is-invalid");
  }
});
$("#telNum").keyup(function () {
  if ($("#telNum").val() != "") {
    $("#telNum").removeClass("is-invalid");
  }
});
$("#EduYear").keyup(function () {
  if ($("#EduYear").val() != "") {
    $("#EduYear").removeClass("is-invalid");
  }
});
$("#StuId").keyup(function () {
  if ($("#StuId").val() != "") {
    $("#StuId").removeClass("is-invalid");
  }
});
$("#fac").change(function () {
  if ($("#fac").val() != "0") {
    $("#fac").removeClass("is-invalid");
  }
});
$("#dep").change(function () {
  if ($("#dep").val() != "0") {
    $("#dep").removeClass("is-invalid");
  }
});

$("#Province").change(function () {
  $("#District").children().remove();
  $("#subdistrict").children().remove();
  showDistricts($(this).val());
});

$("#District").change(function () {
  $("#subdistrict").children().remove();
  showSubDistricts($(this).val());
});


$("#subdistrict").change(function () {
  getZipCode.forEach((element) => {
    if ($(this).val() == element.id) {
      $("#PostalCode").val(element.zip_code);
    }
  });
});

$("#submit").click(function () {
  let name = $("#name").val();
  let surname = $("#surname").val();
  let nickname = $("#nickname").val();
  let birthday = $("#birthday").val();
  let address = $("#address").val();
  let subdistrict = $("#subdistrict").val();
  let District = $("#District").val();
  let Province = $("#Province").val();
  let PostalCode = $("#PostalCode").val();
  let DisaCardId = $("#DisaCardId").val();
  let disType = $("#disType").val();
  let telNum = $("#telNum").val();
  let EduYear = $("#EduYear").val();
  let StuId = $("#StuId").val();
  let fac = $("#fac").val();
  let dep = $("#dep").val();
  setTimeout(function () {
    $(":input").removeClass("animate__animated animate__headShake");
  }, 500);
  if (
    name == "" ||
    surname == "" ||
    nickname == "" ||
    birthday == "" ||
    DisaCardId == "" ||
    disType == "" ||
    telNum == "" ||
    EduYear == "" ||
    StuId == "" ||
    fac == "0" ||
    dep == " 0"
  ) {
    if (name == "") {
      $("#name").addClass("animate__animated animate__headShake is-invalid");
    }
    if (surname == "") {
      $("#surname").addClass("animate__animated animate__headShake is-invalid");
    }
    if (nickname == "") {
      $("#nickname").addClass(
        "animate__animated animate__headShake is-invalid"
      );
    }
    if (birthday == "") {
      $("#birthday").addClass(
        "animate__animated animate__headShake is-invalid"
      );
    }
    if (DisaCardId == "") {
      $("#DisaCardId").addClass(
        "animate__animated animate__headShake is-invalid"
      );
    }
    if (disType == "") {
      $("#disType").addClass("animate__animated animate__headShake is-invalid");
    }
    if (telNum == "") {
      $("#telNum").addClass("animate__animated animate__headShake is-invalid");
    }
    if (EduYear == "") {
      $("#EduYear").addClass("animate__animated animate__headShake is-invalid");
    }
    if (StuId == "") {
      $("#StuId").addClass("animate__animated animate__headShake is-invalid");
    }
    if (fac == "0") {
      $("#fac").addClass("animate__animated animate__headShake is-invalid");
    }
    if (dep == "0") {
      $("#dep").addClass("animate__animated animate__headShake is-invalid");
    }
  } else {
    callAjax();
  }
});
