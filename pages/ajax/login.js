$(document).ready(function () {
  $("#submit").click(function () {
    var form = $("#formLogin")[0];
    var data = new FormData(form);
    console.log(data.username);
    $.ajax({
      type: "POST",
      enctype: "multipart/form-data",
      url: "query/login.php",
      data: data,
      cache: false,
      processData: false,
      contentType: false,
      success: function (data) {
        var new_data = JSON.parse(data);
        if (new_data.status == "true") {
          window.location.href = `main.php`;
        } else {
          alert("ผิดพื๊ด");
        }
      },
    });
  });
});
