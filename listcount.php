<?php 
require_once("config.php");
$search = $_GET["search"];

$sql = "select count(*) from userinfo where  username  like '%$search%' ";
// echo $sql;

$sql_result = mysql_query($sql);

$item = mysql_fetch_row($sql_result);
$obj = array();
$obj["count"] = $item[0];

echo json_encode($obj);

 ?>

