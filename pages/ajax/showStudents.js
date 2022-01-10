var fac = "0";
var dep = "0";
var ShowStudents = () => {
  
  $.ajax({
    type: "GET",
    url: "query/showStudents.php",
    data: {
      fac: fac,
      dep: dep,
    },
    success: function (data) {
      var new_data = JSON.parse(data).studentsObj;
      if(new_data != null){
      console.log(new_data);
      new_data.forEach((element, index) => {
        $("#tbody").append(`
        <tr>
          <th scope="row">${++index}</th>
            <td>${element.userName}</td>
            <td>${element.firstName + " " + element.lastName}</td>
            <td>${element.phone}</td>
            <td><button type="button" class="btn btn-info btn-m" onclick="window.location.href='showOneStudent.php?id=${
              element.id
            }'">ตรวจสอบ</button></td>
            <td><button type="button" class="btn btn-danger btn-m">ลบ</button></td>
        </tr>
        `);
      });
      }
      table =$("#studentsTable").DataTable();
    },
  });
};

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

$(document).ready(function () {
  ShowStudents();
  showDepartments(fac);

  $("#fac").change(function () {
    fac = $("#fac").val();
    dep = $("#dep").val();
    table.destroy()
    $("#tbody").children().remove();
    ShowStudents();
    showDepartments(fac);
  });

  $("#dep").change(function () {
    fac = $("#fac").val();
    dep = $("#dep").val();
    table.destroy()
    $("#tbody").children().remove();
    ShowStudents();
  });
});

// SoloAlert.confirm({
//   title:"แน่ใจนะ",
//   body:"ลบจริงๆนะ ?",
//   useTransparency: true,
//   onOk : ()=>{alert("kuy")},
//   onCancel: ()=>{alert("ยกเลิก")},
// });

