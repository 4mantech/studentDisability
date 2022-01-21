var data_arr = "";

const ShowNews = () => {
  $.ajax({
    type: "GET",
    url: "query/showNews.php",
    data: {},
    success: function (data) {
      const new_data = JSON.parse(data).newsObj;
      data_arr = data;

      if (new_data != null) {
        new_data.forEach((element, index) => {
          $("#tbody").append(`
        <tr>
          <th scope="row">${++index}</th>
            <td><a href="#"><img src="img/news/${
              element.imagePath
            }" class="img-thumbnail" alt="..." width="160" height="90" onclick="showBigImg(${element.id})"></a></td>
            <td>${element.imageName}</td>
            <td>${element.startDate}</td>
            <td>${element.endDate}</td>   
            <td><button id="deleteNews" type="button" class="btn btn-danger btn-m" onclick="deleteNews(${
              element.id
            })">ลบ</button></td>
        </tr>
        `);
        });
      }
      table = $("#tableNews").DataTable();
    },
  });
};

$(document).ready(function () {
  ShowNews();
});
const showBigImg = (id) =>{
$.ajax({
  type:"GET",
  url:"query/showOneNews.php",
  data:{
    id,
  },
  success:function(data){
    let new_data = JSON.parse(data).newsObj;
    console.log(new_data);
    $("#modalNews").modal("show");
    $("#biggerNews").attr("src", `img/news/${new_data[0].imagePath}`);
  }
})
}

$(document).on("click", "#showImg", function () {
 
});
const deleteNews = (id) => {
  SoloAlert.confirm({
    title: "ยืนยัน",
    body: "คุณต้องการลบข้อมูลใช่หรือไม่ ?",
    useTransparency: true,
    onOk: () => {
      window.location.href = `query/deleteNews.php?id=${id}`;
    },
    onCancel: () => {},
  });
};
