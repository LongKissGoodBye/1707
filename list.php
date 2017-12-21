<?php 
require_once("config.php");
$search = $_GET["search"];
$order = $_GET["order"];
$skipnum = $_GET["skipnum"];
$shownum = $_GET["shownum"];

$sql = "select * from userinfo where  username  like '%$search%' ORDER BY $order limit $skipnum,$shownum";

$sql_result = mysqli_query($conn, $sql);

$list = array();

while($item = mysqli_fetch_row($sql_result)){
    $obj = array();
    $obj["id"] = $item[0];
    $obj["username"] = $item[1];
    $obj["userpwd"] = $item[2];
    $list[] = $obj;
}
echo json_encode($list);

 ?>
