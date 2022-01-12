var fac = 0
var file = $('#file')[0].files;
var showDepartments = (facId) => {
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

const callAjax = () =>{
  file = $('#file')[0].files;
  formdata = new FormData()
  formdata.append('name', $("#name").val())
  formdata.append('surname', $("#surname").val())
  formdata.append('nickname', $("#nickname").val())
  formdata.append('birthday', $("#birthday").val())
  formdata.append('address', $("#address").val())
  formdata.append('Province', $("#Province").val())
  formdata.append('District', $("#District").val())
  formdata.append('PostalCode', $("#PostalCode").val())
  formdata.append('DisaCardId', $("#DisaCardId").val())
  formdata.append('disType', $("#disType").val())
  formdata.append('telNum', $("#telNum").val())
  formdata.append('EduYear', $("#EduYear").val())
  formdata.append('StuId', $("#StuId").val())
  formdata.append('fac', $("#fac").val())
  formdata.append('dep', $("#dep").val())
  formdata.append('file', file[0])
  $.ajax({
    type: 'post',
    url: 'query/addStudent.php',
    data: formdata,
    contentType: false,
    processData: false,
    success: function(data) {
        console.log(data)
    }
});
}

$(document).ready(function () {
  showDepartments(fac);
  $("#fac").change(function () {
    fac = $("#fac").val()
    console.log(fac);
    showDepartments(fac);
  })

  $("#submit").click(function () {
    console.log("submit");
    callAjax();
  })

  $("#birthday").change(function () {
    const dob = new Date($("#birthday").val());
    var month_diff = Date.now() - dob.getTime();
    var age_dt = new Date(month_diff);
    var year = age_dt.getUTCFullYear();
    var age = Math.abs(year - 1970);
    $("#age").val(age);
  });
});