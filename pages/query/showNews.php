<?php 
require('connect.php');
if(isset($_GET['forMain'])){
  $forMain = $_GET['forMain'];
}else{
  $forMain = "";
}

$sql ="";
if($forMain == 'yes'){
  $sql ="SELECT * FROM `articlesslide` WHERE startDate <= CURRENT_DATE() AND endDate >= CURRENT_DATE() 
  ORDER BY `articlesslide`.`endDate` DESC";
}else{
  $sql = "SELECT * FROM articlesslide ORDER BY startDate ASC";
}

$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>=1){
  while($r = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $rows['newsObj'][] =$r;
  }
}else{
  $rows['newsObj']= null;
}
print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>