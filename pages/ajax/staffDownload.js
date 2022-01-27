$(document).ready(function () {
  $('#nav_student_info a').addClass(' active');
  const id = $("#id").val();
  $.ajax({
    type: "GET",
    url: "query/staffDownload.php",
    data: {
      id: id,
    },
    success: function (data) {
      const new_data = JSON.parse(data).documentsObj;
      if (new_data != null) {
        $("#studentName").html(`เอกสารของ ${new_data[new_data.length-1].firstNameAndlastName}`)
        new_data.forEach((element) => {
          if (element.documentName == "PaymentStatement") {
            $("#payment").attr(
              "href",
              `documents/students/${element.documentPath}`
            );
            $("#p-payment").html(`ไฟล์: ${element.documentPath}`);
          }
          if (element.documentName == "otherDocument") {
            $("#other").attr(
              "href",
              `documents/students/${element.documentPath}`
            );
            $("#p-other").html(`ไฟล์ : ${element.documentPath} `);
          }
          if (element.documentName == "bankPassbook") {
            $("#bookbank").attr(
              "href",
              `documents/students/${element.documentPath}`
            );
            $("#p-bank").html(`ไฟล์ : ${element.documentPath}`);
          }
        });
      } else {
      }
    },
  });
});
