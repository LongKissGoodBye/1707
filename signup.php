<?php 
@header("content-type:text/html;charset=UTF-8");
@header("Access-Control-Allow-Origin:*");
$connect = mysql_connect("localhost:3306","root","root"); //

$tel = $_GET["tel"];
$userpwd = $_GET["userpwd"];
$code = $_GET["code"];


mysql_select_db("1707");

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
