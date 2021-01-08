<?php

/* Include the Settings
*/
  include "../misc/sql.php";

/* check if a valid sesion exists
*/
  session_start(); // start the session
  echo $_SESSION["username"];
  echo $_SESSION["pw_hash"];
  echo $_SESSION["login_successful"];

?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Adminpanel</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>

    <!-- menu -->
      <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'Content')" id="defaultOpen">Content</button>
        <button class="tablinks" onclick="openCity(event, 'User')">User</button>
        <button class="tablinks" onclick="openCity(event, 'Medien')">Medien</button>
      </div>

    <!-- tab for content -->
      <div id="Content" class="tabcontent">
        <h3>Content</h3>
        <?php include "tabs/tab.content.php"; ?>
      </div>

    <!-- tab for usersettings -->
      <div id="User" class="tabcontent">
        <h3>User</h3>
        <?php include "tabs/tab.user.php"; ?>
      </div>

    <!-- tab for media -->
      <div id="Medien" class="tabcontent">
        <h3>Medien</h3>
        <?php include "tabs/tab.media.php"; ?>
      </div>

    <!-- script to change the tabs -->
      <script>
        function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click()
      </script>

  </body>
</html>
