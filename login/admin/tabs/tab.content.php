<?php

$db = new mysqli($serverpath,$db_user,$db_pw,$db_name);

if($db->connect_error){
  die("Verbindung fehlgeschlagen: " . $db->connect_error);
}

$sql = "SELECT * FROM $content_table";
$ergebnis = $db->query("SET NAMES 'utf8'");
$ergebnis = $db->query($sql);

if($ergebnis->num_rows >0){

  echo "<table><tr><th>Titel</th><th>Autoren</th><th>Datum</th><th>Einstellungen</th></tr>";

  while($row = $ergebnis->fetch_assoc()){
   $id = $row['ID'];
   $titel = $row['title'];
   $author = $row['author'];
   $creadate = $row['crea-date'];

   echo "<tr><td>".$titel."</td><td>".$author."</td><td>".$creadate."</td><td><a href='edit/edit.content.php?edit=$id'>Bearbeiten</a></td></tr>";

  }

  echo "</table>";

}else{
  echo "Leider nichts gefunden";
}

$db->close();
?>
