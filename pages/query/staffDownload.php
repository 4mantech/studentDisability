<?php 
require('connect.php');
$id = $_GET['id'];

$sql = "SELECT
u.id,
u.firstName,
u.lastName,
d.documentPath,
d.documentName,
d.documentType
FROM
users u
INNER JOIN documents d
ON u.id = d.userId
WHERE
userId = '$id'";

$result = mysqli_query($conn,$sql);

$getName = "SELECT id,firstName,lastName FROM users WHERE id = '$id'";
$queryName = mysqli_query($conn,$getName);
$rHA = mysqli_fetch_array($queryName,MYSQLI_ASSOC);
$firstNameAndLastname = $rHA['firstName']. " " . $rHA['lastName'];

if(mysqli_num_rows($result)>=1){
    while($r = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $rows ['documentsObj'][] = $r;
      
    }
    $rows['documentsObj'][] = array("firstNameAndlastName"=>$firstNameAndLastname) ;
}else{
    $rows ['documentsObj'] = null;
}


print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>