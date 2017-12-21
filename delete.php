<?php 
@header("content-type:text/html;charset=UTF-8");
@header("Access-Control-Allow-Origin:*");
$connect = mysql_connect("localhost:3306","root","root"); //1:通过指定的用户名和密码链接到指定的连接处
mysql_select_db("1707");
//2 找到我们需要连接的数据库

$id  = $_GET["id"];
//3 准备好要执行的mysql语句
$var_sql = "DELETE from userinfo where id = $id ";

$var_result = mysql_query($var_sql);//执行该sql语句

$var_count  = mysql_affected_rows();

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
