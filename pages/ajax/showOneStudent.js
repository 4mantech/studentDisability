const editStudent = () => {
  var form = $("#studentInfo")[0];
  var data = new FormData(form);
  console.log(form);
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/editStudent.php",
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (data) {
      if(data == "false"){
        $("#edit").val("editing");
        SoloAlert.alert({
          title:"ผิดพลาด",
          body:"ไม่สามารถแก้ไขได้",
          icon: "error",
          useTransparency: true,
        });
      }else{
        SoloAlert.alert({
          title:"สำเร็จ",
          body:"แก้ไขสำเร็จ",
          icon: "success",
          useTransparency: true,
          onOk : ()=>{location.reload()}
        });
      }
    },
  });
};
const showDepartments = (facId, dep) => {
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
      var html = "";
      console.log(new_data);
      new_data.forEach((element) => {
        console.log(dep);
        html += `<option value="${element.id}"`;

        if (dep == element.id) {
          html += ` selected`;
        }
        html += `> ${element.departmentName}</option>`;
        $("#dep").html(html);
      });
    },
  });
};

$("#edit").click(function () {
  if ($("#edit").val() == "edit") {
    $(".canEdit").prop("disabled", false);
    $("#edit").val("editing");
    $("#edit").text("บันทึก");
    console.log("กำลังแก้");
  } else {
    $("#edit").val("edit");
    editStudent();
    console.log("บันทึก");
  }
});

$("#fac").change(function () {
  fac = $("#fac").val();
  showDepartments(fac);
});

$(document).ready(function () {
  var id = document.getElementById("id").value;
  $.ajax({
    type: "GET",
    url: "query/showOneStudent.php",
    data: {
      id: id,
    },
    success: function (data) {
      var new_data = JSON.parse(data).studentObj;

      $("#name").val(new_data[0]["firstName"]);
      $("#surname").val(new_data[0]["lastName"]);
      $("#nickname").val(new_data[0]["nickName"]);
      $("#birthday").val(new_data[0]["birthDate"]);
      $("#address").val(new_data[0]["address"]);
      $("#Province").val(new_data[0]["province"]);
      $("#District").val(new_data[0]["district"]);
      $("#subdistrict").val(new_data[0]["subDistrict"]);
      $("#PostalCode").val(new_data[0]["postalCode"]);
      $("#DisaCardId").val(new_data[0]["disabilityId"]);
      $("#disType").val(new_data[0]["disabilityType"]);
      $("#telNum").val(new_data[0]["phone"]);
      $("#EduYear").val(new_data[0]["yearOfEdu"]);
      $("#StuId").val(new_data[0]["userName"]);
      $("#fac").val(new_data[0]["facultyId"]);

      var fac = $("#fac").val();
      dep = new_data[0]["departmentId"];

      showDepartments(fac, dep);
      var dob = new Date(new_data[0]["birthDate"]);
      var month_diff = Date.now() - dob.getTime();
      var age_dt = new Date(month_diff);
      var year = age_dt.getUTCFullYear();
      var age = Math.abs(year - 1970);
      $("#age").val(age);
    },
  });
});
