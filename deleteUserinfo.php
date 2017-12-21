<?php 
require_once("config.php");

$Id = $_GET["id"];

$sql = "DELETE from userinfo where id =$Id  ";

mysqli_query($conn, $sql);

$count = mysqli_affected_rows();

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
