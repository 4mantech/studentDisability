var facId = 0;
var facNewName = "";
const showAllFac = () => {
  $.ajax({
    type: "GET",
    url: "query/showAllFac.php",
    data: {},
    success: function (data) {
      const new_data = JSON.parse(data).facObj;
      new_data.forEach((element, index) => {
        $("#tbody").append(`
        <tr>
        <th scope="row" class="text-center">${++index}</th>
          <td>${element.facultyName}</td>
          <td class="text-end">${element.coutDep} สาขา</td>
          <td class="text-center">
          <button id="manageDep" type="button" class="btn btn-primary btn-m" onclick="window.location.href='manageDep.php?facId=${
            element.id
          }'">จัดการสาขา</button>
          <button id="showModalEditFac" type="button" class="btn btn-warning btn-m" onclick="showModalEditFac(${
            element.id
          })">แก้ไข</button>
          <button type="button" class="btn btn-danger btn-m" onclick="deleteFac(${
            element.id
          })">ลบ</button></td>
      </tr>
        `);
      });

      table = $("#tableFac").DataTable({
        pageLength: 15,
        lengthMenu: [15, 30, 60, 120],
      });
    },
  });
};

const editFac = (id, name) => {
  $.ajax({
    type: "POST",
    url: "query/editFac.php",
    data: {
      id: id,
      facName: name,
    },
    success: function (data) {
      if (data == "true") {
        $("#editFacModal").modal("hide");
        SoloAlert.alert({
          title: "สำเร็จ",
          body: "แก้ไขคณะเรียบร้อยแล้ว",
          icon: "success",
          useTransparency: true,
        });
        table.destroy();
        $("#tbody").children().remove();
        showAllFac();
      } else {
        SoloAlert.alert({
          title: "ผิดพลาด",
          body: "ไม่สามารถแก้ไขได้",
          icon: "error",
          useTransparency: true,
        });
      }
    },
  });
};

const showModalEditFac = (id) => {
  $.ajax({
    type: "GET",
    url: "query/showOneFac.php",
    data: {
      id: id,
    },
    success: function (data) {
      let facForEdit = JSON.parse(data).facObj;
      facId = facForEdit[0].id;
      facNewName = facForEdit[0].facultyName;
      $("#facultyNameForEdit").val(facNewName);
      $("#facId").val(facId);
      $("#editFacModal").modal("show");
    },
  });
};

const deleteFac = (facId) => {
  SoloAlert.confirm({
    title: "ยืนยัน",
    body: "คุณต้องการที่จะลบคณะนี้ใช่หรือไม่?",
    useTransparency: true,
    onOk: () => {
      $.ajax({
        type: "POST",
        url: "query/deleteFac.php",
        data: {
          facId: facId,
        },
        success: function (data) {
          if (data == "false") {
            SoloAlert.alert({
              title: "ผิดพลาด",
              body: "ไม่สามารถลบคณะได้",
              icon: "error",
              useTransparency: true,
            });
          } else {
            SoloAlert.alert({
              title: "สำเร็จ",
              body: "ลบคณะสำเร็จ",
              icon: "success",
              useTransparency: true,
              onOk: () => {
                window.location.reload();
              },
            });
          }
        },
      });
    },
    onCancel: () => {},
  });
};

const addFac = (facName) => {
  $.ajax({
    type: "POST",
    url: "query/addFac.php",
    data: {
      facultyName: facName,
    },
    success: function (data) {
      $("#addfacmodal").modal("hide");
      let new_data = JSON.parse(data);
      if (new_data.status == "success") {
        SoloAlert.alert({
          title: "สำเร็จ",
          body: "เพิ่มคณะเรียบร้อยแล้ว",
          icon: "success",
          useTransparency: true,
          onOk:()=>{
            $("#facultyName").val('');
          }
        });
        table.destroy();
        $("#tbody").children().remove();
        showAllFac();
      } else if (new_data.status == "faculty is duplicate") {
        SoloAlert.alert({
          title: "ผิดพลาด",
          body: "มีชื่อคณะนี้แล้ว!!",
          icon: "error",
          useTransparency: true,
          onOk:()=>{
            $("#facultyName").val('');
          }
        });
      } else {
        SoloAlert.alert({
          title: "ผิดพลาด",
          body: "มีบางอย่างผิดพลาด!!",
          icon: "error",
          useTransparency: true,
          onOk:()=>{
            $("#facultyName").val('');
          }
        });
      }
    },
  });
};

$(document).on("click", "#addFac", function () {
  $("#addfacmodal").modal("show");
});
$(document).on("click", "#closemodal", function () {
  $("#addfacmodal").modal("hide");
  $("#facultyName").val("");
});

$(document).on("click", "#confirmAdd", function () {
  let fac = $("#facultyName").val();
  addFac(fac);
});

$(document).on("click", "#confirmEdit", function () {
  facNewName = $("#facultyNameForEdit").val();
  editFac(facId, facNewName);
});
$(document).on("click", "#closeModalEdit", function () {
  $("#editFacModal").modal("hide");
});

$(document).ready(function () {
  showAllFac();
  $('#manage_fac a').addClass(' active');

});
