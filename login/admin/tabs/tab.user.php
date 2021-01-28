<?php

$db = new mysqli($serverpath,$db_user,$db_pw,$db_name);

if($db->connect_error){
  die("Verbindung fehlgeschlagen: " . $db->connect_error);
}

$sql = "SELECT * FROM $user_table";
$ergebnis = $db->query("SET NAMES 'utf8'");
$ergebnis = $db->query($sql);

if($ergebnis->num_rows >0){

  echo "<table><tr><th>Name</th><th>Deine Lizenz</th><th>URL</th><th>Text</th><th>Bearbeiten</th></tr>";

  while($row = $ergebnis->fetch_assoc()){
   $id = $row['ID'];
   $username = $row['username'];
   $shown_name = $row['shown_name'];
   $email = $row['email'];
   $text = $row['text'];

   echo "<tr><td>".$username."</td><td>".$shown_name."</td><td>".$email."</td><td><a href='daten-aendern.php?edit=$id'>Bearbeiten</a></td></tr>";

  }

  echo "</table>";

}else{
  echo "Leider nichts gefunden";
}

$db->close();
?>
