<?php 
@header("content-type:text/html;charset=UTF-8");
@header("Access-Control-Allow-Origin:*");
// $connect = mysql_connect("http://120.78.94.207:3306","root","root");
$conn = mysql_connect("120.78.94.207:3306","root","root");

mysql_select_db('1707');

//如果有错误，存在错误号
if(mysql_errno($conn)){
  echo mysql_error($conn);
  exit;
}



?>