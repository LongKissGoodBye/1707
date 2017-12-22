<?php 
require_once("config.php");
$tel = $_GET["tel"];
$userpwd = $_GET["userpwd"];


$sql = "select userpwd from userinfo where tel = '$tel'";
// echo $sql;

$result = mysql_query($sql);
// echo $result;
$item = mysql_fetch_row($result);
// echo $item;

if ($item != "" && $item[0] == $userpwd) {
    $json = array();
    $json["code"] = 1;
    $json["msg"] = "登录成功";
    echo json_encode($json);
} else {
  $json = array();
  $json["code"] = 0;
  $json["msg"] = "用户名或密码错误";
  echo json_encode($json);
}

mysql_close($conn);
 ?>
