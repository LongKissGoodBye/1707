<?php 
@header("content-type:text/html;charset=UTF-8");
@header("Access-Control-Allow-Origin:*");
$connect = mysql_connect("localhost:3306","root","root");
mysql_select_db("1707");
$search = $_GET["search"];

$sql = "select count(*) from userinfo where  username  like '%$search%' ";

$sql_result = mysql_query($sql);

    $item = mysql_fetch_row($sql_result);
    $obj = array();
    $obj["count"] = $item[0];

echo json_encode($obj);

 ?>
