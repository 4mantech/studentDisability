$(document).ready(function () {
  $("#uploadBtn").prop("disabled", true);
});
$("#file").change(function () {
  if ($("#file").val() == "") {
    $("#uploadBtn").prop("disabled", true);
  } else {
    $("#uploadBtn").prop("disabled", false);
  }
});
$("#uploadBtn").click(function () {
  var file_data = $("#file").prop("files")[0];
  var form_data = new FormData();
  form_data.append("file", file_data);
  $.ajax({
    url: "query/staffUpload.php",
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    type: "POST",
    success: function (data) {
      const new_data = JSON.parse(data).status;
      if (new_data == "success") {
        SoloAlert.alert({
          title: "เรียบร้อย",
          body: "อัพโหลดไฟล์เรียบร้อยแล้ว",
          icon: "success",
          useTransparency: true,
        });
        
      } else {
        SoloAlert.alert({
          title: "ผิดพลาด",
          body: "ไม่สามารถอัพโหลดได้",
          icon: "error",
          useTransparency: true,
        });
      }
    },
  });
});
