<style>
    img {
        width: 848px;
        height: 410px;
    }
    #carouselExampleIndicators
    {
        width: 848px;
        height: 410px;
    }
</style>
<div id="news">
<div class="mt-2">
  <h4>ข่าวประชาสัมพันธ์</h4>
</div>
  <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
  <div class="carousel-indicators" id="btnNews">
    <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> -->

  </div>
  <div class="carousel-inner " id="imgNews">
    <!-- <div class="carousel-item active">
      <img src="img/news/eKob.jpg" class="d-block" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/news/rm.png" class="d-block" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/news/news3.jpg" class="d-block" alt="...">
    </div> -->
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">ก่อนหน้า</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">ถัดไป</span>
  </button>
</div>
</div>
<script>
  $.ajax({
    type:'GET',
    url:"query/showNews.php",
    data: {
      forMain:'yes'
    },
    success:function(data){
      const new_data = JSON.parse(data).newsObj;
      if(new_data == null){
      
      }else{
      let newImg = ""
      let newBtn = ""
      let count =0
 
      new_data.forEach((element,index) => {
        newImg += ` <div class="carousel-item `
        if(index==0){
          newImg += `active`
        }
        newImg += `">`;
        newImg += `<img src="img/news/${element.imagePath}" class="d-block" alt="..."> </div>`

        newBtn += `<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="${count}" `
        if(index==0){
          newBtn += `class="active" aria-current="true" `
        }
         newBtn += `aria-label="Slide ${count}"></button>`
         count+=1
      });
      $("#imgNews").html(newImg);
      $("#btnNews").html(newBtn);
      console.log(new_data);
      }
    },
  })

</script>