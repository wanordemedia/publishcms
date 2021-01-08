<?php

/* login details for the database
*/
  $serverpath = "path-to-database.com:3306";
  $db_user = "database-user";
  $db_pw = "database-password";
  $db_name = "publishCMS";

/* define the tablenames
*/
  $user_table = "user";
  $content_table = "content";
  $media_table = "media";

/* connect to the SQLiteDatabase
*/
$sql_connect = mysqli_connect($serverpath, $db_user, $db_pw, $db_name);

 ?>
