<?php
header('Content-Type:application/json');
@$id=$_REQUEST['id'];
$output=[];
if(empty($id)){
    echo '[]';
    return;
}
require('init.php');

$sql="SELECT did,name,price,img_sm,img_lg,detail,material FROM kf_dish WHERE did='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_all($result,MYSQLI_ASSOC);

if(empty($row)){
    echo '[]';
}
else{
//    $output[]=$row;
    echo json_encode($row);
}
