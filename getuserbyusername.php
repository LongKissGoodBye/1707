<?php  
  header('content-type:text/html;charset=utf8');
  header('Access-Control-Allow-Origin: *');

  $conn = mysql_connect('localhost:3306', 'root', 'root');
  mysql_select_db('1707');
  $username = $_GET["username"];
  $sql = "select id from userinfo where username='$username'";

  $result = mysql_query($sql);

  $list = mysql_fetch_row($result);

  $id = $list[0];

  echo $id;

  mysql_close($conn);


?>