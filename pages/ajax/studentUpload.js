const uploaded = `สถานะ: <span style="color: green;">อัพโหลดเอกสารแล้ว</span>`;
const notUpload = `สถานะ: <span style="color: red;">ยังไม่อัพโหลดเอกสาร</span>`;

const showAlertSuccess = () => {
  SoloAlert.alert({
    title: "เรียบร้อย",
    body: "อัพโหลดไฟล์เรียบร้อยแล้ว",
    icon: "success",
    useTransparency: true,
    onOk : ()=>{location.reload()},
  });
};
const showAlertFail = () => {
  SoloAlert.alert({
    title: "ผิดพลาด",
    body: "ไม่สามารถอัพโหลดไฟล์ได้",
    icon: "error",
    useTransparency: true,
  });
};

$("#otherDocumentUpload").click(function () {
  let id = $("#id").val();
  if ($("#otherDocumentFile").val() == "") {
    $("#otherDocumentFile").addClass("border border-danger");
  } else {
    otherUpload(id);
  }
});

$("#bankPassbookUpload").click(function () {
  let id = $("#id").val();
  if ($("#bankPassbookFile").val() == "") {
    $("#bankPassbookFile").addClass("border border-danger");
  } else {
    bankPassbookUpload(id);
  }
});

$("#PaymentStatementUpload").click(function () {
  let id = $("#id").val();
  if ($("#PaymentStatementFile").val() == "") {
    $("#PaymentStatementFile").addClass("border border-danger");
  } else {
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
      if (data == "true") {
        showAlertSuccess();
      } else {
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
      if (data == "true") {
        showAlertSuccess();
      } else {
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
      if ((data = "true")) {
        showAlertSuccess();
      } else {
        showAlertFail();
      }
    },
  });
};

const showStudentUploaded = (id) =>{
  $.ajax({
    type: "GET",
    url: "query/showStudentUploaded.php",
    data: {
      id
    },
    success: function (data) {
    let payment = 0;
    let bookbank = 0
    let other = 0
     const new_data = JSON.parse(data).docObj;
     console.log(new_data);
     if(new_data != null){
      new_data.forEach(element => {
        if(element == "PaymentStatement"){
          payment =1
        }
        if(element == "bankPassbook"){
          bookbank =1
        }
        if(element == "otherDocument"){
          other =1
        }
      });

      if(payment ==1){
        $("#statusPaymentStatementLabel").html(uploaded);
      }else{
        $("#statusPaymentStatementLabel").html(notUpload);
      }
      if(bookbank ==1){
        $("#bankPassbookLabel").html(uploaded);
      }else{
        $("#bankPassbookLabel").html(notUpload);
      }
      if(other ==1){
        $("#otherDocumentLabel").html(uploaded);
      }else{
        $("#otherDocumentLabel").html(notUpload);
      }
     }else{
      $("#statusPaymentStatementLabel").html(notUpload);
      $("#bankPassbookLabel").html(notUpload);
      $("#otherDocumentLabel").html(notUpload);
     }
    },
  });
}

$(document).ready(function () {
  $("#nav_upload_student a").addClass(" active");
  $("#otherDocumentUpload").prop("disabled", true);
  $("#bankPassbookUpload").prop("disabled", true);
  $("#PaymentStatementUpload").prop("disabled", true);
  let userId = $("#id").val();
  $("#otherDocumentFile").attr("src","./documents/students/1161304620353_otherDoc.pdf")
  showStudentUploaded(userId)
});

$("#PaymentStatementFile").change(function () {
  if ($("#PaymentStatementFile").val() == "") {
    $("#PaymentStatementUpload").prop("disabled", true);
  } else {
    $("#PaymentStatementUpload").prop("disabled", false);
  }
});

$("#bankPassbookFile").change(function () {
  if ($("#bankPassbookFile").val() == "") {
    $("#bankPassbookUpload").prop("disabled", true);
  } else {
    $("#bankPassbookUpload").prop("disabled", false);
  }
});

$("#otherDocumentFile").change(function () {
  if ($("#otherDocumentFile").val() == "") {
    $("#otherDocumentUpload").prop("disabled", true);
  } else {
    $("#otherDocumentUpload").prop("disabled", false);
  }
});