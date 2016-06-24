<html>

<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Quiz</title>
	
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

<?php
include ("dbConnect.php");

$quizName = $_GET["theQuiz"];
$memberNumber =$_GET["x"];

$member_no = $memberNumber;
//Get quiz number
$dbQueryQuizNumber = "SELECT quiz_no FROM quiz WHERE quiz_title = '$quizName'";
$dbResultQuizNumber = mysql_query($dbQueryQuizNumber);
$dbRowQuizNumber = mysql_fetch_array($dbResultQuizNumber);
$theQuizNumber = $dbRowQuizNumber["quiz_no"];

//Get quiz title
$dbQueryTitle = "SELECT quiz_title FROM quiz WHERE quiz_no = $theQuizNumber";
$dbResultTitle = mysql_query($dbQueryTitle);
$dbRowTitle = mysql_fetch_array($dbResultTitle);
$theTitle = $dbRowTitle["quiz_title"];

//Find the quiz_attempt number
$dbQueryFind ="SELECT quiz_attempt_no FROM attempt WHERE quiz_no = $theQuizNumber AND member_no = $member_no";
$dbResultFind = mysql_query($dbQueryFind);
$numberOfAttempts=mysql_num_rows($dbResultFind);
echo "This quiz has been attempted by you $numberOfAttempts times. ";
$division = $numberOfAttempts+1;
 if($numberOfAttempts > 0){
	 echo "The number of points awarded for the leaderboard will be the score normally awarded divided by $division ";
 }
 

 // new quiz attempt number
$quizAttemptNumber = $numberOfAttempts+1;

//Get the question text
$dbQuery="SELECT question_text FROM questions WHERE question_no IN (SELECT question_no FROM setofquestions WHERE quiz_no = $theQuizNumber)";
$dbResult=mysql_query($dbQuery);
$numberOfQuestions=mysql_num_rows($dbResult);

//Get the correct answer
$dbQuery1="SELECT correct FROM answerlist WHERE answerList_no IN (SELECT answerlist_no FROM questions WHERE question_no IN (SELECT question_no FROM setofquestions WHERE quiz_no IN (SELECT quiz_no FROM quiz WHERE quiz_no = $theQuizNumber)))";
$dbResult1=mysql_query($dbQuery1);
//Get the wrong1 answer
$dbQuery2="SELECT wrong1 FROM answerlist WHERE answerList_no IN (SELECT answerlist_no FROM questions WHERE question_no IN (SELECT question_no FROM setofquestions WHERE quiz_no IN (SELECT quiz_no FROM quiz WHERE quiz_no = $theQuizNumber)))";
$dbResult2=mysql_query($dbQuery2);
//Get the wrong2 answer
$dbQuery3="SELECT wrong2 FROM answerlist WHERE answerList_no IN (SELECT answerlist_no FROM questions WHERE question_no IN (SELECT question_no FROM setofquestions WHERE quiz_no IN (SELECT quiz_no FROM quiz WHERE quiz_no = $theQuizNumber)))";
$dbResult3=mysql_query($dbQuery3);
//Get the wrong3 answer
$dbQuery4="SELECT wrong3 FROM answerlist WHERE answerList_no IN (SELECT answerlist_no FROM questions WHERE question_no IN (SELECT question_no FROM setofquestions WHERE quiz_no IN (SELECT quiz_no FROM quiz WHERE quiz_no = $theQuizNumber)))";
$dbResult4=mysql_query($dbQuery4);
//Get the number of points awarded for each question
$dbQueryPts="SELECT score FROM questions WHERE question_no IN (SELECT question_no FROM setofquestions WHERE quiz_no = $theQuizNumber)";
$dbResultPts=mysql_query($dbQueryPts);

//Set the question number, the corresponding correct answer number, and the number of points awarded
$count = 0;
$hundredCount = 100;
$twoHundredCount = 200;

//Set up the form for the quiz
echo "<form action='grade.php' method = 'post' id = 'quiz'>";
echo "<h1>$theTitle</h1>".
	"<h5>$numberOfQuestions questions are available</h5>";
	 
	echo "<ul>";
	 
//Repeat output of each question and options to answer until the all the questions are done
while ($dbRow=mysql_fetch_array($dbResult)) {
	$count++;
	$hundredCount++;
	$twoHundredCount++;
	$dbRow1=mysql_fetch_array($dbResult1);
	$dbRow2=mysql_fetch_array($dbResult2);
	$dbRow3=mysql_fetch_array($dbResult3);
	$dbRow4=mysql_fetch_array($dbResult4);
	$dbRowPts=mysql_fetch_array($dbResultPts);
	
  $theQuestion=$dbRow["question_text"];
  $theAnswer=$dbRow1["correct"];
  $theWrongAnswer1=$dbRow2["wrong1"];
  $theWrongAnswer2=$dbRow3["wrong2"];
  $theWrongAnswer3=$dbRow4["wrong3"];
  $thePoints=$dbRowPts["score"];
  
  $my_array = array("$theAnswer", "$theWrongAnswer1", "$theWrongAnswer2", "$theWrongAnswer3");  
  shuffle($my_array);
  
  echo "<h3>$count. $theQuestion</h3>";
     

  if ($my_array[0] == null){
	  
  }else{
	  echo "<div>";
	  echo "<input type= 'radio' name= '$count'  value='$my_array[0]'/>";
	  echo "<label for='question-$count-answers-A'>$my_array[0] </label>";
	  echo "</div>";
  }
  
  if ($my_array[1] == null){
	  
  }else{
	  echo "<div>";
	  echo "<input type= 'radio' name= '$count'  value='$my_array[1]'/>";
	  echo "<label for='question-$count-answers-B'>$my_array[1] </label>";
	  echo "</div>";
  }
  
  if ($my_array[2] == null){
	  
  }else{
	  echo "<div>";
	  echo "<input type= 'radio' name= '$count' value='$my_array[2]'/>";
	  echo "<label for='question-$count-answers-C'>$my_array[2] </label>";
	  echo "</div>";
  }
  
  if ($my_array[3] == null){
	  
  }else{
	  echo "<div>";
	  echo "<input type= 'radio' name= '$count' value='$my_array[3]'/>";
	  echo "<label for='question-$count-answers-D'>$my_array[3] </label>";
	  echo "</div>";
  }
  
  echo "<input type= 'hidden' name = '$hundredCount' value = '$theAnswer'/>";
  echo "<input type= 'hidden' name = '$twoHundredCount' value = '$thePoints'/>";
  
}//while
echo "<input type= 'hidden' name = 'memberNumber' value = '$member_no'/>";
echo "<input type= 'hidden' name = 'quizNumber' value = '$theQuizNumber'/>";
echo "<input type= 'hidden' name = 'quizAttemptNumber' value = '$quizAttemptNumber'/>";
echo "</ul>";

?>
	<input type="submit" value="Submit Quiz">
	</form>
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