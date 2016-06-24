<html>

<head>
<title>List of questions by quiz</title>
</head>

<body>

<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Genre
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#GeneralKnowledge">General Knowledge</a></li>
    <li><a href="#Sport">Sport</a></li>
    <li><a href="#Music">Music</a></li>
	<li><a href="#History">History</a></li>
	<li><a href="#Geography">Geography</a></li>
	<li><a href="#TV">TV/Film</a></li>
	<li><a href="#Religion">Religion</a></li>
	<li><a href="#Literature">Literature</a></li>
  </ul>
</div>


<?php
include ("dbConnect.php");



$dbQuery="SELECT question_text FROM questions WHERE question_no IN (SELECT question_no FROM setofquestions WHERE quiz_no = 101000)";
$dbResult=mysql_query($dbQuery);
$numberOfQuestions=mysql_num_rows($dbResult);


echo "<h1>$numberOfQuestions questions are available</h1>".
     "<ul>";

while ($dbRow=mysql_fetch_array($dbResult)) {
  $theQuestion=$dbRow["question_text"];
  echo "<li><a>$theQuestion</a></li>"; 
}

 echo "</ul>";

?>

</body>

</html>