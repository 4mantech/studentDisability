var userId = "";

var ShowUsers = () => {
  $.ajax({
    type: "GET",
    url: "query/showUsers.php",
    data: {},
    success: function (data) {
      var new_data = JSON.parse(data).usersObj;
      if (new_data != null) {
        var html = "";
        new_data.forEach((element, index) => {
          element.role = "เจ้าหน้าที่";
          html += `<tr>`;
          html += `<th scope="row">${++index}</th>`;
          html += `<td>${element.userName}</td>`;
          html += `<td>${element.firstName} ${element.lastName}</td>`;
          html += `<td>${element.role}</td>`;
          html += `<td class="text-center"><button class="btn btn-warning" onclick="showModalEdit(${element.id})">แก้ไข</button>
          <button class="btn btn-danger" onclick="confirmDel(${element.id})">ลบ</button></td>`;
          html += `</tr>`;
        });
      }
      $("#tbody").html(html);
      table = $("#tableUsers").DataTable();
    },
  });
};
const confirmDel = (id) => {
  SoloAlert.confirm({
    title: "ยืนยัน",
    body: "คุณต้องการเจ้าหน้าที่คนนี้ใช่หรือไม่ ?",
    useTransparency: true,
    onOk: () => {
      deleteUser(id);
    },
    onCancel: () => {},
  });
};

$(document).ready(function () {
  ShowUsers();
  $("#manage_user a").addClass(" active");
});

const showModalEdit = (id) => {
  userId = id;
  showOneUser(id);

  $("#editUserModal").modal("show");
};
const editUser = (id) => {
  let form = $("#myform")[0];
  let data = new FormData(form);
  data.append("id", id);
  data.append("age",$("#age").val());
  $("#editUserModal").modal("hide");
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/editUser.php",
    data: data,
    processData: false,
    contentType: false,
    cache: false,
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
          body: "แก้ไขเรียบร้อยแล้ว",
          icon: "success",
          useTransparency: true,
          onOk: () => {
            window.location.href = "manageUsers.php";
          },
        });
      }
    },
  });
};

$("#confirmAdd").click(function () {
  editUser(userId);
});

const deleteUser = (id) => {
  $.ajax({
    type: "POST",
    url: "query/deleteStudent.php",
    data: {
      id,
    },
    success: function (data) {
      let new_data = JSON.parse(data);
      if (new_data.status == "true") {
        SoloAlert.alert({
          title: "สำเร็จ",
          body: "ลบข้อมูลเรียบร้อยแล้ว",
          icon: "success",
          useTransparency: true,
          onOk: () => {
            location.reload();
          },
        });
      } else {
        SoloAlert.alert({
          title: "ผิดพลาด",
          body: "ไม่สามารถลบข้อมูลได้",
          icon: "error",
          useTransparency: true,
        });
      }
    },
  });
};
const showOneUser = (id) => {
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
      $("#subdistrict").val(new_data[0]["subDistrict"]);
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
