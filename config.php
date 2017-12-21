<?php 
@header("content-type:text/html;charset=UTF-8");
@header("Access-Control-Allow-Origin:*");
// $connect = mysql_connect("http://120.78.94.207:3306","root","root");
$conn = mysqli_connect("localhost:3306","root","root", '1707');

//如果有错误，存在错误号
if(mysqli_errno($conn)){
  echo mysqli_error($conn);
  exit;
}

mysqli_set_charset($conn,'utf8');



?>