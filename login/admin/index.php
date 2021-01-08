<?php

  session_start();
  echo $_SESSION["username"];
  echo $_SESSION["pw_hash"];
  echo $_SESSION["login_successful"];

?>
