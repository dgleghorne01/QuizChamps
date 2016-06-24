<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>List of quizzes by Genre</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="homepage.html">Quiz Champs</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
		    <a href="userhomepage.php" class="btn btn-success" role="button">My Homepage</a>
			<a href="homepage.html" class="btn btn-danger" role="button">Log Out</a>		  
			<a href="leaderboard.php" class="btn btn-warning" role="button">Leaderboard</a>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h1>All Quizzes by genre</h1>
		<p>Find a quiz containing at least one question from your selected genre</p>
		
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


<a NAME="GeneralKnowledge">
<h2>General Knowledge</h2>
</a>



<?php
$memberNumber = $_GET["x"];

  include ("dbConnect.php");
  $dbQuery="SELECT quiz_title FROM quiz WHERE quiz_no IN (SELECT quiz_no FROM setofquestions WHERE question_no IN (SELECT question_no FROM questions WHERE genre_no = 2))";
  $dbResult=mysql_query($dbQuery);
  
  if($dbResult === FALSE) {
    die(mysql_error()); // TODO: better error handling
  }

  while ($dbRow=mysql_fetch_array($dbResult)) {
     $theQuiz=$dbRow["quiz_title"];
     echo "<a href=\"quiz.php?theQuiz=$theQuiz&x=$memberNumber\">$theQuiz</a><br>";

  }
?>
 

<a NAME="Sport">
<h2>Sport</h2>
</a>

<?php
$memberNumber = $_GET["x"];

  include ("dbConnect.php");
  $dbQuery="SELECT quiz_title FROM quiz WHERE quiz_no IN (SELECT quiz_no FROM setofquestions WHERE question_no IN (SELECT question_no FROM questions WHERE genre_no = 1))";
  $dbResult=mysql_query($dbQuery);
  
  if($dbResult === FALSE) {
    die(mysql_error()); // TODO: better error handling
  }

  while ($dbRow=mysql_fetch_array($dbResult)) {
     $theQuiz=$dbRow["quiz_title"];
     echo "<a href=\"quiz.php?theQuiz=$theQuiz&x=$memberNumber\">$theQuiz</a><br>";

  }
?>

<a NAME="Music">
<h2>Music</h2>
</a>

<?php
$memberNumber = $_GET["x"];

  include ("dbConnect.php");
  $dbQuery="SELECT quiz_title FROM quiz WHERE quiz_no IN (SELECT quiz_no FROM setofquestions WHERE question_no IN (SELECT question_no FROM questions WHERE genre_no = 3))";
  $dbResult=mysql_query($dbQuery);
  
  if($dbResult === FALSE) {
    die(mysql_error()); // TODO: better error handling
  }

  while ($dbRow=mysql_fetch_array($dbResult)) {
     $theQuiz=$dbRow["quiz_title"];
     echo "<a href=\"quiz.php?theQuiz=$theQuiz&x=$memberNumber\">$theQuiz</a><br>";

  }
?>

<a NAME="History">
<h2>History</h2>
</a>

<?php
$memberNumber = $_GET["x"];

  include ("dbConnect.php");
  $dbQuery="SELECT quiz_title FROM quiz WHERE quiz_no IN (SELECT quiz_no FROM setofquestions WHERE question_no IN (SELECT question_no FROM questions WHERE genre_no = 4))";
  $dbResult=mysql_query($dbQuery);
  
  if($dbResult === FALSE) {
    die(mysql_error()); // TODO: better error handling
  }

  while ($dbRow=mysql_fetch_array($dbResult)) {
     $theQuiz=$dbRow["quiz_title"];
     echo "<a href=\"quiz.php?theQuiz=$theQuiz&x=$memberNumber\">$theQuiz</a><br>";

  }
?>

<a NAME="Geography">
<h2>Geography</h2>
</a>

<?php
$memberNumber = $_GET["x"];

  include ("dbConnect.php");
  $dbQuery="SELECT quiz_title FROM quiz WHERE quiz_no IN (SELECT quiz_no FROM setofquestions WHERE question_no IN (SELECT question_no FROM questions WHERE genre_no = 5))";
  $dbResult=mysql_query($dbQuery);
  
  if($dbResult === FALSE) {
    die(mysql_error()); // TODO: better error handling
  }

  while ($dbRow=mysql_fetch_array($dbResult)) {
     $theQuiz=$dbRow["quiz_title"];
     echo "<a href=\"quiz.php?theQuiz=$theQuiz&x=$memberNumber\">$theQuiz</a><br>";

  }
?>

<a NAME="TV">
<h2>TV/Film</h2>
</a>

<?php
$memberNumber = $_GET["x"];

  include ("dbConnect.php");
  $dbQuery="SELECT quiz_title FROM quiz WHERE quiz_no IN (SELECT quiz_no FROM setofquestions WHERE question_no IN (SELECT question_no FROM questions WHERE genre_no = 6))";
  $dbResult=mysql_query($dbQuery);
  
  if($dbResult === FALSE) {
    die(mysql_error()); // TODO: better error handling
  }

  while ($dbRow=mysql_fetch_array($dbResult)) {
     $theQuiz=$dbRow["quiz_title"];
     echo "<a href=\"quiz.php?theQuiz=$theQuiz&x=$memberNumber\">$theQuiz</a><br>";

  }
?>

<a NAME="Religion">
<h2>Religion</h2>
</a>

<?php
$memberNumber = $_GET["x"];

  include ("dbConnect.php");
  $dbQuery="SELECT quiz_title FROM quiz WHERE quiz_no IN (SELECT quiz_no FROM setofquestions WHERE question_no IN (SELECT question_no FROM questions WHERE genre_no = 7))";
  $dbResult=mysql_query($dbQuery);
  
  if($dbResult === FALSE) {
    die(mysql_error()); // TODO: better error handling
  }

  while ($dbRow=mysql_fetch_array($dbResult)) {
     $theQuiz=$dbRow["quiz_title"];
     echo "<a href=\"quiz.php?theQuiz=$theQuiz&x=$memberNumber\">$theQuiz</a><br>";

  }
?>

<a NAME="Literature">
<h2>Literature</h2>
</a>

<?php

$memberNumber = $_GET["x"];

  include ("dbConnect.php");
  $dbQuery="SELECT quiz_title FROM quiz WHERE quiz_no IN (SELECT quiz_no FROM setofquestions WHERE question_no IN (SELECT question_no FROM questions WHERE genre_no = 8))";
  $dbResult=mysql_query($dbQuery);
  
  if($dbResult === FALSE) {
    die(mysql_error()); // TODO: better error handling
  }

  while ($dbRow=mysql_fetch_array($dbResult)) {
     $theQuiz=$dbRow["quiz_title"];
     echo "<a href=\"quiz.php?theQuiz=$theQuiz&x=$memberNumber\">$theQuiz</a><br>";

  }
?>


  </div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	
	
  </body>
</html>