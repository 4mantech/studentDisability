$(document).ready(function () {
  let id = $("#id").val();
  $.ajax({
    type: "GET",
    url: "query/showOneStudent.php",
    data: {
      id: id,
    },
    success: function (data) {
      let new_data = JSON.parse(data).studentObj;
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
      $("#fac").val(new_data[0].facultyId);
      let fac = new_data[0].facultyId;
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
    },
  });
});
const showDepartments = (facId, depId) => {
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
      newData.forEach((element) => {
        html += ` <option value="${element.id}"`;
        if (element.id == depId && depId !=0) {
          html += " selected";
        }
        html += `>${element.departmentName}</option>`;
        $("#dep").html(html);
      });
    },
  });
};

$("#file").change(function(){
    preview_image(event)
  })
  function preview_image(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('profileimg');
      output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
  }