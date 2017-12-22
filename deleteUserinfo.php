<?php 
require_once("config.php");

$Id = $_GET["id"];

$sql = "DELETE from userinfo where id =$Id  ";

$result = mysql_query($sql);

$count = mysql_affected_rows($result);

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
