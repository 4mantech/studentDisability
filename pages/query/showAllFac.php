<?php 
require('connect.php');
$sql = "SELECT * FROM faculties";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>=1){
  while($r = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $rows['facObj'][] =$r;
  }
}else{
  $rows['facObj']= null;
}
print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>