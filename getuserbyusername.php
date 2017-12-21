<?php  
require_once("config.php");
  $username = $_GET["username"];
  $sql = "select id from userinfo where username='$username'";

  $result = mysqli_query($conn, $sql);

  $list = mysqli_fetch_row($result);

  $id = $list[0];

  echo $id;

  mysqli_close($conn);


?>