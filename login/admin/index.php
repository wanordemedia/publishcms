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
  <title>Adminpanel</title>
  <link rel="stylesheet" href="main.css">
  <script type="text/javascript" src="tabs/tab.js"></script>
	<script type="text/javascript" src="tabs/popup.js"></script>

  <body>

  <!-- menu -->
  <div class="tab">
    <button class="tablinks" onclick="openSetting(event, 'Content')" id="defaultOpen" >Content</button>
    <button class="tablinks" onclick="openSetting(event, 'User')">User</button>
    <button class="tablinks" onclick="openSetting(event, 'Medien')">Medien</button>
  </div>

  <!-- tab for content -->
    <div id="Content" class="tabcontent">
      <h3>Content</h3>
      <?php include "tabs/tab.content.php"; ?>
		  <div class="popup" id="popup-1">
  			  <div class="content">
    				<div class="close-btn" onclick="togglePopup()">&times;</div>
    				<h1>Beitrag/Seite bearbeiten</h1>
    				<?php include "edit/edit.content.php"; ?>
  			  </div>
  		</div>
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
