<?php
//defines all the $get's
$getauthor = mysqli_query("SELECT author FROM content WHERE permalink = $getpermalink");
$getpublisher = mysqli_query("SELECT content  FROM globalsettings WHERE name = 'publisher'");
$getdescription = mysqli_query("SELECT description FROM content WHERE permalink = $getpermalink");
$getkeywords = mysqli_query("SELECT keywords FROM content WHERE permalink = $getpermalink");
$getpagetopic = mysqli_query("SELECT content FROM content WHERE name = 'permalink'");
$getpagetype = mysqli_query("SELECT content FROM content WHERE name = 'permalink'");
$getaudience = mysqli_query("SELECT content FROM globalsettings WHERE name = 'audience'");
$getlanguage = mysqli_query("SELECT content FROM globalsettings WHERE name = 'language'");
$getcopyright = mysqli_query("SELECT copyright FROM content WHERE permalink = $getpermalink");
$gettitle = mysqli_query("SELECT title FROM content WHERE permalink = $getpermalink");
$getheader = mysqli_query("SELECT header FROM content WHERE permalink = $getpermalink");

$follow = mysqli_query("SELECT follow FROM content WHERE permalink = $getpermalink");
$doindex = mysqli_query("SELECT doindex FROM content WHERE permalink = $getpermalink");
if ($follow) {
  $getrobotinfo = "follow, ";
}
else {
  $getrobotinfo = "nofollow, ";
}

if ($doindex) {
  $getrobotinfo .= "index";
}
else {
  $getrobotinfo .= "noindex";
}
?>
