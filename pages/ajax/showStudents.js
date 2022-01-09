var fac = "";
var dep = "";

var ShowStudents = () => {
  console.log(fac + dep);
  $.ajax({
    type: "GET",
    url: "query/showStudents.php",
    data: {
      fac: fac,
      dep: dep,
    },
    success: function (data) {
      var new_data = JSON.parse(data).studentsObj;
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

        table= $("#studentsTable").DataTable({
          destroy: true,
          language: {
            decimal: "",
            emptyTable: "ไม่พบข้อมูล",
            info: "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
            infoEmpty: "แสดง 0 ถึง 0 จาก 0 แถว",
            infoFiltered: "(กรอง จาก _MAX_ total แถว)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "แสดง _MENU_ แถว",
            loadingRecords: "กำลังโหลด...",
            processing: "กำลังประมวลผล...",
            search: "ค้นหา:",
            zeroRecords: "ไม่พบข้อมูล",
            paginate: {
              first: "หน้าแรก",
              last: "หน้าสุดท้าย",
              next: "ถัดไป",
              previous: "ก่อนหน้า",
            },
            aria: {
              sortAscending: ": activate to sort column ascending",
              sortDescending: ": activate to sort column descending",
            },
          },
        });
      });
    },
  });
};

$(document).ready(function () {
  ShowStudents();

  $("#fac").change(function () {
    fac = $("#fac").val();
    $('#tbody').children().remove();
    ShowStudents();
    
  });

  $("#footer").removeClass("fixed-bottom");
  $("#footer").addClass("sticky-bottom");
});

// SoloAlert.confirm({
//   title:"แน่ใจนะ",
//   body:"ลบจริงๆนะ ?",
//   useTransparency: true,
//   onOk : ()=>{alert("kuy")},
//   onCancel: ()=>{alert("ยกเลิก")},
// });
