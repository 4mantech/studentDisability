var showDepartments = (facId,dep) => {
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
        var html="";
        new_data.forEach((element) => {
          html += `<option value="${element.id}"`
          if(dep = element.departmentId){
            html += `selected `
          }
          html += `> ${element.departmentName}</option>`
          $("#dep").html(html)
        });
      },
    });
  };

$(document).ready(function () {
  var id = document.getElementById("id").value;

//   var dob = new Date(dob);
//   var today = new Date();
//   var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
//   $('#age').html(age);

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
      $("#PostalCode").val(new_data[0]["postalCode"]);
      $("#DisaCardId").val(new_data[0]["disabilityId"]);
      $("#disType").val(new_data[0]["disabilityType"]);
      $("#telNum").val(new_data[0]["phone"]);    
      $("#EduYear").val(new_data[0]["yearOfEdu"]);
      $("#StuId").val(new_data[0]["userName"]);    
      $("#fac").val(new_data[0]["facultyId"]);    
      var fac = $("#fac").val();
      var dep = new_data[0]["departmentId"];
      showDepartments(fac)
      console.log(new_data[0]["departmentId"]);
    },
  });

});

// var dob = new Date("#birthday");  
// var month_diff = Date.now() - dob.getTime();  
// var age_dt = new Date(month_diff);     
// var year = age_dt.getUTCFullYear();  
// var age = Math.abs(year - 1970);
// $("age").val(age)
  
