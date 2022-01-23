$("#otherDocumentUpload").click(function () {
  let id = $("#id").val()
  otherUpload(id);
});
$("#bankPassbookUpload").click(function () {
  let id = $("#id").val()
  bankPassbookUpload(id);
});
$("#PaymentStatementUpload").click(function () {
  let id = $("#id").val()
  PaymentUpload(id);
});

const otherUpload = (id) => {
  let form = $("#otherForm")[0];
  let data = new FormData(form);
  data.append("typeFile", "otherDocument");
  data.append("id", id);
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/studentUploads.php",
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (data) {
      console.log(data);
      // console.log("สำเร็จ");
    },
  });
};

const bankPassbookUpload = (id) => {
  let form = $("#bankForm")[0];
  let data = new FormData(form);
  data.append("typeFile", "bankPassbook");
  data.append("id", id);
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/studentUploads.php",
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (data) {
      console.log(data);
    },
  });
};
 
const PaymentUpload = (id) => {
  let form = $("#PaymentForm")[0];
  let data = new FormData(form);
  data.append("typeFile", "Payment");
  data.append("id", id);
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/studentUploads.php",
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (data) {
      console.log(data); 
      // if (data == "true") {
        //     console.log("true นะ");
        //     SoloAlert.alert({
        //       title: "สำเร็จ",
        //       body: "อัพโหลดสำเร็จแล้ว",
        //       icon: "success",
        //       useTransparency: true,
        //       onOk: () => {
        //         location.reload();
        //       },
        //     });
        //   } else {
        //     console.log("false นะ");
        //     SoloAlert.alert({
        //       title: "ผิดพลาด",
        //       body: "ไม่สามารถอัพโหลดได้",
        //       icon: "error",
        //       useTransparency: true,
        //     });
        //   }    
        },
  });
};
