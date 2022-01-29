
const showModalEditPassword = (id) => {
  $("#changePassword").modal("show");
  $("#studentId").val(id);
};
$("#newPassword").keyup(function () {
  if ($("#newPassword").val() == "") {
    $("#newPassword").addClass(" is-invalid");
  } else {
    $("#newPassword").removeClass(" is-invalid");
  }
});
$("#savePassword").click(function () {
  let password = $("#newPassword").val();
  let id = $("#studentId").val();
  if (password == "") {
    $("#newPassword").addClass(" is-invalid");
  } else {
    editPassword(id, password);
  }
});

$("#cancelModal").click(function () {
  $("#newPassword").val("");
  $("#newPassword").removeClass(" is-invalid");
  $("#changePassword").modal("hide");
});
const editPassword = (id, password) => {
  $.ajax({
    type: "POST",
    url: "query/changeStudentPassword.php",
    data: {
      id,
      password,
    },
    success: function (data) {
      if(data == "true"){
        SoloAlert.alert({
          title: "สำเร็จ",
          body: "แก้ไขข้อมูลเรียบร้อยแล้ว",
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