<?php 
require_once("config.php");
//2 找到我们需要连接的数据库

$id  = $_GET["id"];
//3 准备好要执行的mysql语句
$var_sql = "DELETE from userinfo where id = $id ";

$var_result = mysqli_query($conn, $var_sql);//执行该sql语句

$var_count  = mysqli_affected_rows();

if($var_count>0){
    $json = array();
    $json["code"] = 1;
    $json["msg"]= "成功";
    echo json_encode($json);
}else{
    $json = array();
    $json["code"] = 0;
    $json["msg"]= "失败";
    echo json_encode($json);
}



 ?>
