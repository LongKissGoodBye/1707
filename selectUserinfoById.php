<?php 
require_once("config.php");
//2 找到我们需要连接的数据库

$Id  = $_GET["id"];
//3 准备好要执行的mysqli语句
$var_sql = "select  * from userinfo where id = $Id ";

//4 执行指定的sql语句
$var_result  = mysqli_query($conn, $var_sql);

//5:遍历一行一行的结果


    $item = mysqli_fetch_row($var_result);

    $temp = array();//我要把他当做对象来使用
    $temp["id"] = $item[0];
    $temp["username"]= $item[1];
    $temp["userpwd"] = $item[2];


echo json_encode($temp);

mysqli_close($conn);

 ?>
