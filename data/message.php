<?php
header('Content-Type:application/json');

@$uname=$_REQUEST['uname'];
@$company=$_REQUEST['company'];
@$phone=$_REQUEST['phone'];
@$email=$_REQUEST['email'];
@$words=$_REQUEST['words'];

@$order_time=time();
$nowTime=Date("Y-m-d",$order_time);

if(empty($uname) ||empty($company) ||empty($phone) ||empty($email) ||empty($words)){
    echo '[]';
    return;
}

$output=[];

$conn=mysqli_connect('127.0.0.1','root','','kaifanla',3306);
$sql="SET NAMES UTF8";
mysqli_query($conn,$sql);

$sql="INSERT INTO message VALUES(NULL,'$uname','$company','$phone','$email','$nowTime','$words')";
$result=mysqli_query($conn,$sql);

if($result===false){  //SQL执行失败-SQL语法错误
    //echo '{"code":5, "msg":"insert err", "sql":"'.$sql.'"}';
    $output['code'] = 5;
    $output['msg'] = 'insert err';
    $output['sql'] = $sql;
}else{
    $output['code'] = 1;
    $output['userId'] = mysqli_insert_id($conn);
}
echo json_encode($output);