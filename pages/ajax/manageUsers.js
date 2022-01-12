var ShowUsers = () => {
  $.ajax({
    type: "GET",
    url: "query/showUsers.php",
    data: {},
    success: function (data) {
      var new_data = JSON.parse(data).usersObj;
      if (new_data != null) {
        var html = "";
        console.log(new_data);
        new_data.forEach((element, index) => {
          if (element.role == 0) {
            element.role = "แอดมิน";
          } else if (element.role == 1) {
            element.role = "เจ้าหน้าที่";
          } else if (element.role == 2) {
            element.role = "นักศึกษา";
          }
          html += `<tr>`;
          html += `<th scope="row">${++index}</th>`;
          html += `<td>${element.userName}</td>`;
          html += `<td>${element.firstName} ${element.lastName}</td>`;
          html += `<td>${element.role}</td>`;
          html += `</tr>`;
        });
      }
      $("#tbody").html(html);
      table = $("#tableUsers").DataTable();
    },
  });
};
$(document).ready(function () {
  ShowUsers();
});
