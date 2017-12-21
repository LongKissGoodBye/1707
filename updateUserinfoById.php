<?php 
require_once("config.php");

$Id = $_GET["id"];
$username = $_GET["username"];
$userpwd = $_GET["userpwd"];

//后台验证 验证该用户名是否可用

if(checkUsernameById($username,$Id)){


$sql = "update  userinfo set username = '$username',userpwd ='$userpwd' where id = $Id ";
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
}else{
      $json = array();
      $json["code"] =0;
      $json["msg"]= "该用户名已经存在";
     echo  json_encode($json);
}

function  checkUsernameById($username,$id){
    $var_sql = "select  id from userinfo where username = '$username' ";
    //4 执行指定的sql语句
    $var_result  = mysql_query($var_sql);
    //5:遍历一行一行的结果
    $item = mysql_fetch_row($var_result);

    if($item[0]==$id || $item[0]==null){
        return true;
    }else{
        return false;
    }

}

 ?>
