<?php 
require_once("config.php");
//2 找到我们需要连接的数据库

//3 准备好要执行的mysql语句
$var_sql = "select * from userinfo";

//4 执行指定的sql语句
$var_result  = mysql_query($var_sql);

//5:遍历一行一行的结果
$var_list = array();

while($item = mysql_fetch_row($var_result)){
    $temp = array();//我要把他当做对象来使用
    $temp["id"] = $item[0];
    $temp["username"]= $item[1];
    $temp["userpwd"] = $item[2];
    $var_list[] = $temp;
}
echo json_encode($var_list);

mysql_close();

 ?>
