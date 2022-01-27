const showDep = (facId) => {
  $.ajax({
    type: "GET",
    url: "query/showDepartments.php",
    data: {
      fac: facId,
    },
    success: function (data) {
      const new_data = JSON.parse(data).depObj;
      if (new_data != null) {
        new_data.forEach((element, index) => {
          $("#tbody").append(`
            <tr>
            <th scope="row" class="text-center">${++index}</th>
              <td>${element.departmentName}</td>
              <td class="text-center">
              <button id="showModalEditFac" type="button" class="btn btn-warning btn-m" 
              onclick="showModalEditFac(${facId},${element.id})">แก้ไข</button>
              <button type="button" class="btn btn-danger btn-m" 
              onclick="deleteDep(${element.id})">ลบ</button></td>
          </tr>
            `);
        });
        table = $("#tableDep").DataTable();
      }
    },
  });
};

var depName = $("#depName").val();

const deleteDep = (depId) => {
  SoloAlert.confirm({
    title: "ยืนยัน",
    body: "คุณต้องการที่จะลบสาขานี้ใช่หรือไม่?",
    useTransparency: true,
    onOk: () => {
      $.ajax({
        type: "POST",
        url: "query/deleteDep.php",
        data: {
          depId: depId,
        },
        success: function (data) {
          if (data == "false") {
            SoloAlert.alert({
              title: "ผิดพลาด",
              body: "ไม่สามารถลบสาขาได้",
              icon: "error",
              useTransparency: true,
            });
          } else {
            SoloAlert.alert({
              title: "สำเร็จ",
              body: "ลบสาขาสำเร็จ",
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

const addDep = (facId, depName) => {
  $.ajax({
    type: "POST",
    url: "query/addDep.php",
    data: {
      facId: facId,
      depName: depName,
    },
    success: function (data) {
      const newData = JSON.parse(data).status;
      if (newData == "department is duplicate") {
        SoloAlert.alert({
          title: "ผิดพลาด",
          body: "ไม่สามารถเพิ่มสาขาได้",
          icon: "error",
          useTransparency: true,
        });
        $("#addDepModal").modal("hide");
        $("#depName").val("");
      } else {
        SoloAlert.alert({
          title: "สำเร็จ",
          body: "เพิ่มสาขาสำเร็จ",
          icon: "success",
          useTransparency: true,
          onOk: () => {
            window.location.reload();
          },
        });
      }
    },
  });
};

const editDep = (facId, depId, newDepName) => {
  $.ajax({
    type: "POST",
    url: "query/editDep.php",
    data: {
      facId: facId,
      depId: depId,
      depName: newDepName,
    },
    success: function (data) {
      if (data == "false") {
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
            window.location.reload();
          },
        });
      }
    },
  });
};

const showModalEditFac = (facId, depId) => {
  $.ajax({
    type: "GET",
    url: "query/showOneDep.php",
    data: {
      depId: depId,
      facId: facId,
    },
    success: function (data) {
      let depForEdit = JSON.parse(data).depObj;
      depName = depForEdit[0].departmentName;
      facId = depForEdit[0].facultyId;
      depIdForEdit = depForEdit[0].id;
      $("#facIdForEdit").val(facId);
      $("#depNameForEdit").val(depName);
      $("#depIdForEdit").val(depIdForEdit);
      $("#editDepModal").modal("show");
    },
  });
};

$("#confirmEdit").click(function () {
  let newDepName = $("#depNameForEdit").val();
  let facIdForEdit = $("#facIdForEdit").val();
  let depIdForEdit = $("#depIdForEdit").val();

  editDep(facIdForEdit, depIdForEdit, newDepName);
});

$("#closeModalEdit").click(function () {
  $("#editDepModal").modal("hide");
});
$("#closemodal").click(function () {
  $("#addDepModal").modal("hide");
});

$(document).ready(function () {
  $('#manage_fac a').addClass(' active');

  $("#addDep").click(function () {
    $("#addDepModal").modal("show");
  });

  $("#confirmAdd").click(function () {
    facId = $("#facId").val();
    depName = $("#depName").val();
    addDep(facId, depName);
  });

  var facId = $("#facId").val();
  showDep(facId);

  $.ajax({
    type: "GET",
    url: "query/showOneFac.php",
    data: {
      id: facId,
    },
    success: function (data) {
      let facForEdit = JSON.parse(data).facObj;
      facNewName = facForEdit[0].facultyName;
      $("#facName").text(facNewName);
    },
  });
});
