<?php  
require_once("config.php");
  $username = $_GET["username"];
  $sql = "select id from userinfo where username='$username'";

  $result = mysql_query($sql);

  $list = mysql_fetch_row($result);

  $id = $list[0];

  echo $id;

  mysql_close($conn);


?>