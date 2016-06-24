<html>

<head>
<title>List All Quizzes</title>
</head>

<body>

<?php

include ("dbConnect.php");

$thisGenreNo=$_GET["genre_no"];

$dbQuery="select quiz_title from quiz where genre_no=$thisGenreNo order by quiz_title asc";
$dbResult=mysql_query($dbQuery);
$numberOfAlbums=mysql_num_rows($dbResult);

if ($numberOfAlbums>1)
    echo "<h1>$numberOfAlbums albums are available</h1>";
else    
    echo "<h1>$numberOfAlbums album is available</h1>";
echo "<ul>";

while ($dbRow=mysql_fetch_array($dbResult)) {
  $theAlbumID=$dbRow["id"];
  $theAlbumTitle=$dbRow["title"];
  echo "<li><a href=\"listTracks.php?albumID=$theAlbumID\">$theAlbumTitle</a></li>";
}

echo "</ul>";
?>

<a href="listArtists.php">Back to list of artists</a
</body>

</html>





