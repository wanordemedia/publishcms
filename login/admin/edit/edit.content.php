<?php

$get_content_id = $id;

if($sql_connect->connect_error) { // If the connection did not work, an error is output
  die("Verbindung fehlgeschlagen: " . $sql_connect->connect_error);
}

$sql= "SELECT * FROM `$content_table` WHERE `ID` = '$get_content_id'";

$ergebnis = $sql_connect->query("SET NAMES 'utf8'");
$ergebnis = $sql_connect->query($sql); // Query of data from the database

if($ergebnis->num_rows >0){
  while($row = $ergebnis->fetch_assoc()){ // get an associative array from the database

    $permalink_down = $row['permalink'];
    $title_down = $row['title'];
    $author_down = $row['author'];
    $creadate_down = $row['crea-date'];
    $header_down = $row['header'];
    $content_down = $row['content'];
    $follow_down = $row['follow'];
    $doindex_down = $row['doindex'];
    $description_down = $row['description'];
    $keywords_down = $row['keywords'];
    $ispost_down = $row['ispost'];
    $pagetype_down = $row['pagetype'];
    $pagetopic_down = $row['pagetopic'];

  }

}else{
  echo "Leider nichts gefunden, bitte versuche es nocheinmal";
}

if(isset($_POST['update'])) {

  $permalink_up = $_POST['permalink'];
  $title_up = $_POST['title'];
  $author_up = $_POST['author'];
  $creadate_up = $_POST['crea-date'];
  $header_up = $_POST['header'];
  $content_up = $_POST['content'];
  $description_up = $_POST['description'];
  $keywords_up = $_POST['keywords'];
  $ispost_up = $_POST['ispost'];
  $pagetype_up = $_POST['pagetype'];

  if ($_POST['dofollow'] === 'true') {$follow_up = "1";} else {$follow_up = "0";}
	if ($_POST['doindex'] === 'true') {$doindex_up = "1";} else {$doindex_up = "0";}


  $update = "UPDATE `$content_table` SET
  `permalink`='$permalink_up',
  `title`='$title_up',
  `author`='$author_up',
  `header`='$header_up',
  `content`='$content_up',
  `description`='$description_up',
  `keywords`='$keywords_up',
  `follow`='$follow_up',
  `doindex`='$doindex_up',
  `ispost`='$ispost_up',
  `pagetopic`='$pagetopic_up',
  `pagetype`='$pagetype_up' WHERE `ID` = '$get_content_id'";

 $qry = mysqli_query($sql_connect,$update);
 if($qry) {
  header("location: https://account.twc-media.de/benutzer/result.php?success=1");
 }else {
	header("location: https://account.twc-media.de/benutzer/result.php?success=0");
 }
}

?>


<center>
<form method="POST" action="">

	<div>
	 <label for="text">Permalink:</label>	<br>
	 <input type="text" name="permalink" value="<?php echo $permalink_down; ?>"><br><br>
	</div>

  <div>
   <label for="text">Title:</label>	<br>
   <input type="text" name="title" value="<?php echo $title_down; ?>"><br><br>
  </div>

  <div>
   <label for="text">Autor:</label>	<br>
   <input type="text" name="author" value="<?php echo $author_down; ?>"><br><br>
  </div>

  <div>
   <label for="text">Header:</label>	<br>
   <input type="text" name="header" value="<?php echo $header_down; ?>"><br><br>
  </div>

  <div>
   <label for="text">Beschreibung:</label>	<br>
   <input type="text" name="description" value="<?php echo $description_down; ?>"><br><br>
  </div>

  <div>
   <label for="text">Keywords:</label>	<br>
   <input type="text" name="keywords" value="<?php echo $keywords_down; ?>"><br><br>
  </div>

	<div>
	 <label for="text">Inhalt:</label>	<br>
 	 <textarea type="text" name="content" cols="35" rows="4"><?php echo $content_down; ?></textarea> <br><br>
	</div>

	<input type="checkbox" id="dofollow" name="dofollow" value="true"
		   <?php if($follow_down === '1') echo 'checked="checked"';?> />
  	<label for="vehicle1"> Dofollow</label><br>

	<input type="checkbox" id="doindex" name="doindex" value="true"
		   <?php if($doindex_down === '1') echo 'checked="checked"';?>>
  	<label for="vehicle1"> Doindex</label><br>

	<div>
	 <label for="text">Letzte Änderung:</label>	<br>
 	 <input  type="text" readonly name="updated_at" value="<?php echo $creadate_down; ?>"><br><br>

 <input type="submit" name="update" value="Update">



</form>

</div>
