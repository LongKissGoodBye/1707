<?php
/**
 * 验证码通知短信接口
 */
@header('content-type:text/html; charset=utf8');
@header('Access-Control-Allow-Origin: *');
require_once("include/config.php");
require_once("include/httpUtil.php");

/**
 * url中{function}/{operation}?部分
 */
$funAndOperate = "industrySMS/sendSMS";

// 参数详述请参考http://miaodiyun.com/https-xinxichaxun.html

// 生成body
$body = createBasicAuthData();
// 在基本认证参数的基础上添加短信内容和发送目标号码的参数


$conn = mysql_connect('localhost:3306', 'root', 'root');

mysql_select_db('1707');

$tel = $_GET["tel"];
$sql = "select count(*) from userinfo where tel = '$tel'";
$result = mysql_query($sql);
$item = mysql_fetch_row($result);


if($item[0] > 0) {
  $json = array();
  $json["code"] = 0;
  $json["msg"] = "该手机号已经注册";
  echo json_encode($json);
} else {
  $rand = rand(1000, 9999);
  $sql = "select count(*) from telcode where tel = '$tel'";
  $result_1 = mysql_query($sql);
  $item = mysql_fetch_row($result_1);
  if ($item[0] > 0) {
    $sql = "update telcode set code = $rand where tel = '$tel'";
  } else {
    $sql = "insert into telcode (tel, code) values ('$tel', '$rand')";
    // echo $sql;
  }

  // echo $sql;

  mysql_query($sql);
  $result_count = mysql_affected_rows();
  $json = array();
  if ($result_count > 0) {
    $json["code"] = 1;
    $json["msg"] = "发送成功";
  } else {
    $json["code"] = 0;
    $json["msg"] = "发送失败";
  }

  echo json_encode($json);

  $body['smsContent'] = "【残废科技】您的验证码为{$rand}，如非本人操作，请忽略此短信。";
  // echo $body['smsContent'];
  $body['to'] = $tel;

  // 提交请求
  $result = post($funAndOperate, $body);
  // echo $result;
  // echo("<br/>result:<br/><br/>");
  // var_dump($result);

}




