const showAlertSuccess = () =>{
  SoloAlert.alert({
          title: "เรียบร้อย",
          body: "อัพโหลดไฟล์เรียบร้อยแล้ว",
          icon: "success",
          useTransparency: true,
        });
}
const showAlertFail = () =>{
  SoloAlert.alert({
          title: "ผิดพลาด",
          body: "ไม่สามารถอัพโหลดไฟล์ได้",
          icon: "error",
          useTransparency: true,
        });
}

$("#otherDocumentUpload").click(function () {
  let id = $("#id").val()
  if($("#otherDocumentFile").val()==""){
    $("#otherDocumentFile").addClass('border border-danger');
  }else{
    otherUpload(id);
  }
});

$("#bankPassbookUpload").click(function () {
  let id = $("#id").val()
  if($("#bankPassbookFile").val()==""){
    $("#bankPassbookFile").addClass('border border-danger');
  }else{
    bankPassbookUpload(id);
  }
});

$("#PaymentStatementUpload").click(function () {
  let id = $("#id").val()
  if($("#PaymentStatementFile").val()==""){
    $("#PaymentStatementFile").addClass('border border-danger');
  }else{
    PaymentUpload(id);
  }
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
      if(data == "true"){
        showAlertSuccess();
      }else{
        showAlertFail();
      }
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
      if(data == "true"){
        showAlertSuccess();
      }else{
        showAlertFail();
      }
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
      if(data = "true"){
        showAlertSuccess();
      }else{
        showAlertFail();
      }
        },
  });
};

$(document).ready(function(){

  $("#otherDocumentUpload").prop("disabled", true);
  $("#bankPassbookUpload").prop("disabled", true);
  $("#PaymentStatementUpload").prop("disabled", true);
  
  $("#PaymentStatementFile").change(function () {
    if($("#PaymentStatementFile").val()==""){
      $("#PaymentStatementUpload").prop("disabled", true);
    }else{
      $("#PaymentStatementUpload").prop("disabled", false);
    }
  })

  $("#bankPassbookFile").change(function () {
    if($("#bankPassbookFile").val()==""){
      $("#bankPassbookUpload").prop("disabled", true);
    }else{
      $("#bankPassbookUpload").prop("disabled", false);
    }
  })

  $("#otherDocumentFile").change(function () {
    if($("#otherDocumentFile").val()==""){
      $("#otherDocumentUpload").prop("disabled", true);
    }else{
      $("#otherDocumentUpload").prop("disabled", false);
    }
  })
  
});