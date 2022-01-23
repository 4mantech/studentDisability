var fac = "";
$(document).ready(function () {
  let id = $("#id").val();
  $.ajax({
    type: "GET",
    url: "query/showOneStudent.php",
    data: {
      id: id,
    },
    success: function (data) {
      const new_data = JSON.parse(data).studentObj;
      console.log(new_data);
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
  console.log(fac);
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
        // $("#fac").append(`
        // <option value="${element.id}">${element.facultyName}</option>
        // `);
      });
      $("#fac").html(html);
    },
  });
};

const showDepartments = (facId, depId) => {
  console.log(facId);
  $.ajax({
    type: "GET",
    url: "query/ShowDepartments.php",
    data: {
      fac: facId,
    },
    success: function (data) {
      const newData = JSON.parse(data).depObj;
      console.log(newData);
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

  $("#age").val(age);
  let age = $("#age").val();
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
  $("#edit").removeClass("btn-warning")
  if ($("#edit").val() == "edit") {
    $(".canEdit").prop("disabled", false);
    $("#edit").val("editing");
    $("#edit").addClass("btn-success")
    $("#edit").text("บันทึก");
  } else {
    $("#edit").val("edit");
    editStudent();
  }
});
