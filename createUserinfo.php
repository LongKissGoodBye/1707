<?php 
@header("content-type:text/html;charset=UTF-8");
@header("Access-Control-Allow-Origin:*");
$connect = mysql_connect("localhost:3306","root","root");
mysql_select_db("1707");

$username = $_GET["username"];
$userpwd = $_GET["userpwd"];

$sql = "insert into userinfo(username,userpwd) values('$username','$userpwd')";
mysql_query($sql);
$count = mysql_affected_rows();

if ($count >0) {
    $json = array();
    $json["code"] =1;
    $json["msg"]= "成功";
    echo  json_encode($json);
}else{
    $json = array();
    $json["code"] =0;
    $json["msg"]= "失败";
    echo  json_encode($json);
}

 ?>