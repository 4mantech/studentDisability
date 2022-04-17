var getZipCode = {};
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

const showInfoProvince = (provinceId) => {
  $.ajax({
    type: "get",
    url: "query/showProvinces.php",
    success: function (response) {
      $("#Province").children().remove();
      const { provincesObj } = JSON.parse(response);
      let html = "";
      provincesObj.forEach((element) => {
        html += `<option value="${element.id}"`;
        if (provinceId == element.id) {
          html += "selected";
        }
        html += `>${element.name_in_thai}</option>`;
      });
      $("#Province").append(html);
    },
  });
};

const showInfoDistrict = (provinceId, districtId) => {
  $.ajax({
    type: "get",
    data: {
      provinceId,
    },
    url: "query/showDistricts.php",
    success: function (response) {
      const { districtsObj } = JSON.parse(response);
      $("#District").children().remove();
      let html = "";
      districtsObj.forEach((element) => {
        html += `<option value="${element.id}"`;
        if (districtId == element.id) {
          html += "selected";
        }
        html += `>${element.name_in_thai}</option>`;
      });
      showInfoSubDistrict(districtsObj[0].id);

      $("#District").append(html);
    },
  });
};

const showInfoSubDistrict = (districtId, subDistrictId) => {
  $.ajax({
    type: "get",
    data: {
      districtId,
    },
    url: "query/showSubDistricts.php",
    success: function (response) {
      $("#subdistrict").children().remove();
      const { subDistrictsObj } = JSON.parse(response);
      let html = "";
      subDistrictsObj.forEach((element) => {
        html += `<option value="${element.id}"`;
        if (subDistrictId == element.id) {
          html += " selected";
        }
        html += `>${element.name_in_thai}</option>`;
      });
      showZipCode(subDistrictsObj[0].id);
      $("#subdistrict").append(html);
    },
  });
};

const showZipCode = (subDistrictId) => {
  $.ajax({
    type: "GET",
    url: "query/showZipcode.php",
    data: {
      subDistrictId,
    },
    success: function (response) {
      const { zipCodeObj } = JSON.parse(response);
      $("#PostalCode").val(zipCodeObj.zip_code);
    },
  });
};

const editStudent = () => {
  var form = $("#studentInfo")[0];
  var data = new FormData(form);
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

$("#edit").click(function () {
  if ($("#edit").val() == "edit") {
    $(".canEdit").prop("disabled", false);
    $("#edit").val("editing");
    $("#edit").text("บันทึก");
  } else {
    $("#edit").val("edit");
    editStudent();
  }
});

$("#Province").change(function (e) {
  e.preventDefault();
  showInfoProvince(e.currentTarget.value);
  showInfoDistrict(e.currentTarget.value);
});
$("#District").change(function (e) {
  e.preventDefault();
  showInfoSubDistrict(e.currentTarget.value);
});
$("#subdistrict").change(function (e) {
  e.preventDefault();
  showZipCode(e.currentTarget.value);
});

$("#fac").change(function () {
  let fac = $("#fac").val();
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
$(document).ready(function () {
  let id = $("#id").val();
  $("#nav_student_info a").addClass(" active");

  $.ajax({
    type: "GET",
    url: "query/showOneStudent.php",
    data: {
      id: id,
    },
    success: function (data) {
      // data คือ ค่าที่ได้รับกลับมาจากการ query
      const new_data = JSON.parse(data).studentObj;
      if (new_data == null) {
        $(".contents").remove(); // # ไอดี || . class
        $.get("components/404.php", function (data) {
          $("body").append(data); //
        });
      } else {
        if (new_data[0].role == 1) {
          $(".contents").remove();
          $.get("components/403.php", function (data) {
            $("body").append(data);
          });
        } else {
          $(`#prefix  option[value="${new_data[0].prefix}"]`).prop(
            "selected",
            true
          );
          $("#name").val(new_data[0].firstName);
          $("#surname").val(new_data[0].lastName);
          $("#nickname").val(new_data[0].nickName);
          $("#birthday").val(new_data[0].birthDate);
          $("#address").val(new_data[0].address);
          $("#Province").val(new_data[0].province);
          $("#District").val(new_data[0].district);
          $("#subdistrict").val(new_data[0].subDistrict);
          $("#DisaCardId").val(new_data[0].disabilityId);
          $("#disType").val(new_data[0].disabilityType);
          $("#telNum").val(new_data[0].phone);
          $("#EduYear").val(new_data[0].yearOfEdu);
          $("#StuId").val(new_data[0].userName);
          $("#fac").val(new_data[0].facultyId);
          $("#PostalCode").val(new_data[0].zip_code);
          var fac = new_data[0].facultyId;
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
          showInfoProvince(new_data[0].provinceId);
          showInfoDistrict(new_data[0].provinceId, new_data[0].districtId);
          showInfoSubDistrict(
            new_data[0].districtId,
            new_data[0].subDistrictId
          );
        }
      }
    },
  });
});
