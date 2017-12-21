<?php 
require_once("config.php");

$tel = $_GET["tel"];
$userpwd = $_GET["userpwd"];
$code = $_GET["code"];


$sql = "select code from telcode where tel = '$tel'";
// echo $sql;

$result = mysql_query($sql);

$item = mysql_fetch_row($result);


if ($item[0] == $code) {
  $sql = "insert into userinfo (tel, userpwd) value ('$tel', '$userpwd')";
  mysql_query($sql);
  $count = mysql_affected_rows();
  
  if ($count > 0) {
    $json = array();
    $json["code"] = 1;
    $json["msg"] = "成功";
    echo json_encode($json);
  } else {
    $json = array();
    $json["code"] = 0;
    $json["msg"] = "失败";
    echo json_encode($json);
  }
} else {
  $json = array();
  $json["code"] = 0;
  $json["msg"] = "验证码错误";
  echo json_encode($json);
}



mysql_close($connect);

 ?>
