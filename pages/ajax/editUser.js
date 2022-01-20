var id = $("#id").val();

const ShowOneUser = (id) => {
  $.ajax({
    type: "GET",
    url: "query/showEditUser.php",
    data: {
      id: id,
    },
    success: function (data) {
      var new_data = JSON.parse(data).userObj;
      $("#name").val(new_data[0]["firstName"]);
      $("#surname").val(new_data[0]["lastName"]);
      $("#birthday").val(new_data[0]["birthDate"]);
      $("#telNum").val(new_data[0]["phone"]);
      $("#StuId").val(new_data[0]["userName"]);
      $("#DisaCardId").val(new_data[0]["idCardNumber"]);
      $("#nickname").val(new_data[0]["nickName"]);
      $("#telNum").val(new_data[0]["phone"]);
      var dob = new Date(new_data[0]["birthDate"]);
      var month_diff = Date.now() - dob.getTime();
      var age_dt = new Date(month_diff);
      var year = age_dt.getUTCFullYear();
      var age = Math.abs(year - 1970);
      $("#age").val(age);
    },
  });
};

$("#birthday").change(function () {
    const dob = new Date($("#birthday").val());
    var month_diff = Date.now() - dob.getTime();
    var age_dt = new Date(month_diff);
    var year = age_dt.getUTCFullYear();
    var age = Math.abs(year - 1970);
    $("#age").val(age);
});

$("#submit").click(function () {
  var form = $("#myform")[0];
  var data = new FormData(form);
  let age =  $("#age").val()
  data.append('age',age)
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/editUser.php",
    processData: false,
    contentType: false,
    cache: false,
    data: data,
    success: function (data) {
      if(data == "true"){
          SoloAlert.alert({
            title:"สำเร็จ",
            body:"แก้ไขสำเร็จ",
            icon: "success",
            useTransparency: true,
            onOk : ()=>{location.reload()}
          });
      }else{
        SoloAlert.alert({
            title:"ผิดพลาด",
            body:"ไม่สามารถแก้ไขได้",
            icon: "error",
            useTransparency: true,
          });
        }
    },
  });
});


$(document).ready(function () {
  ShowOneUser(id);
});
