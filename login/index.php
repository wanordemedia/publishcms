<?php

/* Include the Settings
*/
  include "settings.php"; // Include the SQL-Settings

/* Clear all Variables
  All variables are set to "NULL" in case they are still loaded from a previous session
*/
  $usr_up = "NULL";
  $pw_up = "NULL";

/* Function to retrieve data from input, encrypt password and write to database.
*/
  if(isset($_POST["send"])) {

  	$email_up = $_POST['usr_email']; // Get the textinput form the form.
  	$pw_up = $_POST['pass'];

    if($sql_connect->connect_error) { // If the connection did not work, an error is output
      die("Verbindung fehlgeschlagen: " . $sql_connect->connect_error);
    }

    $pos = strpos($email_up, '@');
    if ($pos = true) {
      $sql= "SELECT `pw-hash` FROM `$user_table` WHERE `email` = '$email_up'"; // Get the password from the database and compare it
    } else {
      $sql= "SELECT `pw-hash` FROM `$user_table` WHERE `username` = '$email_up'"; // Get the password from the database and compare it
    }

    $ergebnis = $sql_connect->query("SET NAMES 'utf8'");
    $ergebnis = $sql_connect->query($sql); // Query of data from the database
    if($ergebnis->num_rows >0){
      while($row = $ergebnis->fetch_assoc()){ // get an associative array from the database
        $erg = $row['pw-hash'];
      }

    }else{
      echo "Leider nichts gefunden, bitte versuche es nocheinmal";
    }

    $hash_pw = hash('sha512', $pw); // Encrypt the passwort with Hash512 and a salt.
    if ($pw_down == $pw) { // Compare the encryptet password to the database.
      echo "Passwort stimmt überein";
      header("Location: https://google.de");
    }

    session_start();
    $_SESSION["username"] = base64_encode($email_up);
    $_SESSION["pw_hash"] = base64_encode($hash_pw);
    $_SESSION["login_successful"] = "yes";

  }

  ?>

  <!DOCTYPE html>
   <!-- Begining of the GUI -->
  <html lang="de" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Login</title>
    </head>
    <body>
  <center>
      <form action="" method="post">

  		  <input type="text" name="usr_email" placeholder="e-Mail-Adress" required><br><br> <!-- name request -->

        <input type="text" name="pass" placeholder="Passwort" required><br><br> <!-- password request -->

        <input type="submit" name="send" value="Absenden"/>
      </form>

    </center>
    </body>
  </html>
