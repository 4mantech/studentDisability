const ShowNews = () => {
  $.ajax({
    type: "GET",
    url: "query/showNews.php",
    data: {},
    success: function (data) {
      const new_data = JSON.parse(data).newsObj;
      if(new_data != null){
      console.log(new_data);
      new_data.forEach((element, index) => {
        $("#tbody").append(`
        <tr>
          <th scope="row">${++index}</th>
            <td> <img src="img/news/${element.imagePath}" class="img-thumbnail" alt="..." width="160" height="90"></td>
            <td>${element.imageName}</td>
            <td>${element.startDate}</td>
            <td>${element.endDate}</td>   
            <td><button id="deleteNews" type="button" class="btn btn-danger btn-m" onclick="deleteNews(${element.id})">ลบ</button></td>
        </tr>
        `);
      });
      }
      table =$("#tableNews").DataTable();
    },
  });
};


$(document).ready(function(){
 ShowNews();
});

const deleteNews = (id) => {
SoloAlert.confirm({
  title:"ยืนยัน",
  body:"คุณต้องการลบข้อมูลใช่หรือไม่ ?",
  useTransparency: true,
  onOk : ()=>{window.location.href = `query/deleteNews.php?id=${id}`},
  onCancel: ()=>{},
});
}