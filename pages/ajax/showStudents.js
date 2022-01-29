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
      const new_data = JSON.parse(data).studentsObj;
      if (new_data != null) {
        new_data.forEach((element, index) => {
          $("#tbody").append(`
        <tr>
          <th scope="row">${++index}</th>
            <td>${element.userName}</td>
            <td>${element.firstName + " " + element.lastName}</td>
            <td>${element.facultyName}</th>
            <td>${element.departmentName}</th>
            <td>${element.disabilityType}</th>
            <td>${element.phone}</td>
            <td><button type="button" class="btn btn-info btn-m" onclick="window.location.href='showOneStudent.php?id=${
              element.id
            }'">ตรวจสอบ</button>
            <button type="button" class="btn btn-warning btn-m" onclick="showModalEditPassword(${
              element.id
            })">เปลี่ยนรหัสผ่าน</button>
            <button type="button" class="btn btn-danger btn-m" onclick="areYouSure(${
              element.id
            })">ลบ</button></td>
        </tr>
        `);
        });
      }
      table = $("#studentsTable").DataTable();
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
      const new_data = JSON.parse(data).depObj;
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

$(document).ready(function () {
  showFaculties();
  ShowStudents();
  showDepartments(fac);
  $('#nav_student_info a').addClass(' active');

  $("#fac").change(function () {
    fac = $("#fac").val();
    dep = 0;
    table.destroy();
    $("#tbody").children().remove();
    ShowStudents();
    showDepartments(fac);
  });

  $("#dep").change(function () {
    fac = $("#fac").val();
    dep = $("#dep").val();
    table.destroy();
    $("#tbody").children().remove();
    ShowStudents();
  });
});

const areYouSure = (id) => {
  SoloAlert.confirm({
    title: "ยืนยัน",
    body: "คุณต้องการลบนักศึกษาคนนี้ใช่หรือไม่ ?",
    useTransparency: true,
    onOk: () => {
      deleteStudent(id);
    },
    onCancel: () => {},
  });
};

const deleteStudent = (id) => {
  $.ajax({
    type: "POST",
    url: "query/deleteStudent.php",
    data: {
      id,
    },
    success: function (data) {
      let new_data = JSON.parse(data);
      if (new_data.status == "true") {
        SoloAlert.alert({
          title: "สำเร็จ",
          body: "ลบข้อมูลเรียบร้อยแล้ว",
          icon: "success",
          useTransparency: true,
          onOk: () => {
            location.reload();
          },
        });
      } else {
        SoloAlert.alert({
          title: "ผิดพลาด",
          body: "ไม่สามารถลบข้อมูลได้",
          icon: "error",
          useTransparency: true,
        });
      }
    },
  });
};
