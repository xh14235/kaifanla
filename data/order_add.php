<?php
header('Content-Type:application/json');
@$user_name=$_REQUEST['user_name'];
@$sex=$_REQUEST['sex'];
@$phone=$_REQUEST['phone'];
@$addr=$_REQUEST['addr'];
@$did=$_REQUEST['did'];

@$order_time=time();
$nowTime=Date("Y-m-d",$order_time);

$output=[];
$arr=[];

if(empty($user_name) ||empty($sex) ||empty($phone) ||empty($addr) ||empty($did)){
    echo '[]';
    return;
}

require('init.php');

$sql="INSERT INTO kf_order VALUES(NULL,'$phone','$user_name','$sex','$nowTime','$addr','$did')";
$result=mysqli_query($conn,$sql);

if($result){
    $arr['msg']='succ';
    $arr['oid']=mysqli_insert_id($conn);
}
else{
    $arr['msg']='error';
}
$output[]=$arr;
echo json_encode($output);