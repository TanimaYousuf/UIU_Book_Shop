<?php

  $id = $_GET['id'];
  // do some validation here to ensure id is safe

  
  $sql = "SELECT cover FROM  WHERE post_id=$id";
  $result = mysql_query("$sql");
  $row = mysql_fetch_assoc($result);
  mysql_close($link);

  header("Content-type: image/jpeg");
  echo $row['cover'];
?>