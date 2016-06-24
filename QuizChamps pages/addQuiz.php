<?php
if (isset($_POST["action"]) && $_POST["action"]=="addQuiz") {

   include ("dbConnect.php");

   //Add the new quiz  
   $theQuizText=$_POST["quiz_title"];
   if ($theQuizText != null){
   $adminNumber =$_POST["admin"];
      //Get last number of the quiz numbers
	  $dbQuery="SELECT MAX(quiz_no) FROM quiz";
	  $dbResult=mysql_query($dbQuery);
      $dbRow=mysql_fetch_array($dbResult);
      $theLastNo1=$dbRow["MAX(quiz_no)"];
	  
	  //Insert the new quiz
	  $newQuizNo = $theLastNo1+1;
      $dbQuery="insert into quiz values ('$newQuizNo','$adminNumber', '$theQuizText')";
      $dbResult=mysql_query($dbQuery);
 
   
   //Get last number of the setofquestions
   $dbQuery1="SELECT MAX(question_set_no) FROM setofquestions";
   $dbResult1=mysql_query($dbQuery1);
   $dbRow=mysql_fetch_array($dbResult1);
   $theLastNo=$dbRow["MAX(question_set_no)"];
   
   
   //Add the new setofquestions
   $counter=0;
	
   $theQuestion1=$_POST["1"];	
   $theQuestion2=$_POST["2"];
   $theQuestion3=$_POST["3"];
   $theQuestion4=$_POST["4"];
   $theQuestion5=$_POST["5"];
   $theQuestion6=$_POST["6"];
   $theQuestion7=$_POST["7"];
   $theQuestion8=$_POST["8"];
   $theQuestion9=$_POST["9"];
   $theQuestion10=$_POST["10"];

   $dbQueryFindQ1 = "SELECT question_no From questions where question_text = '$theQuestion1'";
   $dbResultFindQ1 = mysql_query($dbQueryFindQ1);
   $dbRowQ1=mysql_fetch_array($dbResultFindQ1);
   $theQuestionNumber1 = $dbRowQ1["question_no"];
   
   $counter++;
   $setQuestionNo1 = $theLastNo+$counter;
   
   $dbQueryQ1="insert into setofquestions values ('$setQuestionNo1','$theQuestionNumber1', '$counter', '$newQuizNo')";
   $dbResultQ1=mysql_query($dbQueryQ1); 

   $dbQueryFindQ2 = "SELECT question_no From questions where question_text = '$theQuestion2'";
   $dbResultFindQ2 = mysql_query($dbQueryFindQ2);
   $dbRowQ2=mysql_fetch_array($dbResultFindQ2);
   $theQuestionNumber2 = $dbRowQ2["question_no"];
   
   $counter++;
   $setQuestionNo2 = $theLastNo+$counter;
   
   $dbQueryQ2="insert into setofquestions values ('$setQuestionNo2','$theQuestionNumber2', '$counter', '$newQuizNo')";
   $dbResultQ2=mysql_query($dbQueryQ2);
   
   $dbQueryFindQ3 = "SELECT question_no From questions where question_text = '$theQuestion3'";
   $dbResultFindQ3 = mysql_query($dbQueryFindQ3);
   $dbRowQ3=mysql_fetch_array($dbResultFindQ3);
   $theQuestionNumber3 = $dbRowQ3["question_no"];
   
   $counter++;
   $setQuestionNo3 = $theLastNo+$counter;
   
   $dbQueryQ3="insert into setofquestions values ('$setQuestionNo3','$theQuestionNumber3', '$counter', '$newQuizNo')";
   $dbResultQ3=mysql_query($dbQueryQ3);
   
   $dbQueryFindQ4 = "SELECT question_no From questions where question_text = '$theQuestion4'";
   $dbResultFindQ4 = mysql_query($dbQueryFindQ4);
   $dbRowQ4=mysql_fetch_array($dbResultFindQ4);
   $theQuestionNumber4 = $dbRowQ4["question_no"];
   
   $counter++;
   $setQuestionNo4 = $theLastNo+$counter;
   
   $dbQueryQ4="insert into setofquestions values ('$setQuestionNo4','$theQuestionNumber4', '$counter', '$newQuizNo')";
   $dbResultQ4=mysql_query($dbQueryQ4);
   
   $dbQueryFindQ5 = "SELECT question_no From questions where question_text = '$theQuestion5'";
   $dbResultFindQ5 = mysql_query($dbQueryFindQ5);
   $dbRowQ5=mysql_fetch_array($dbResultFindQ5);
   $theQuestionNumber5 = $dbRowQ5["question_no"];
   
   $counter++;
   $setQuestionNo5 = $theLastNo+$counter;
   
   $dbQueryQ5="insert into setofquestions values ('$setQuestionNo5','$theQuestionNumber5', '$counter', '$newQuizNo')";
   $dbResultQ5=mysql_query($dbQueryQ5);
   
   $dbQueryFindQ6 = "SELECT question_no From questions where question_text = '$theQuestion6'";
   $dbResultFindQ6 = mysql_query($dbQueryFindQ6);
   $dbRowQ6=mysql_fetch_array($dbResultFindQ6);
   $theQuestionNumber6 = $dbRowQ6["question_no"];
   
   $counter++;
   $setQuestionNo6 = $theLastNo+$counter;
   
   $dbQueryQ6="insert into setofquestions values ('$setQuestionNo6','$theQuestionNumber6', '$counter', '$newQuizNo')";
   $dbResultQ6=mysql_query($dbQueryQ6);
   
   $dbQueryFindQ7 = "SELECT question_no From questions where question_text = '$theQuestion7'";
   $dbResultFindQ7 = mysql_query($dbQueryFindQ7);
   $dbRowQ7=mysql_fetch_array($dbResultFindQ7);
   $theQuestionNumber7 = $dbRowQ7["question_no"];
   
   $counter++;
   $setQuestionNo7 = $theLastNo+$counter;
   
   $dbQueryQ7="insert into setofquestions values ('$setQuestionNo7','$theQuestionNumber7', '$counter', '$newQuizNo')";
   $dbResultQ7=mysql_query($dbQueryQ7);
   
   $dbQueryFindQ8 = "SELECT question_no From questions where question_text = '$theQuestion8'";
   $dbResultFindQ8 = mysql_query($dbQueryFindQ8);
   $dbRowQ8=mysql_fetch_array($dbResultFindQ8);
   $theQuestionNumber8 = $dbRowQ8["question_no"];
   
   $counter++;
   $setQuestionNo8 = $theLastNo+$counter;
   
   $dbQueryQ8="insert into setofquestions values ('$setQuestionNo8','$theQuestionNumber8', '$counter', '$newQuizNo')";
   $dbResultQ8=mysql_query($dbQueryQ8);
   
   $dbQueryFindQ9 = "SELECT question_no From questions where question_text = '$theQuestion9'";
   $dbResultFindQ9 = mysql_query($dbQueryFindQ9);
   $dbRowQ9=mysql_fetch_array($dbResultFindQ9);
   $theQuestionNumber9 = $dbRowQ9["question_no"];
   
   $counter++;
   $setQuestionNo9 = $theLastNo+$counter;
   
   $dbQueryQ9="insert into setofquestions values ('$setQuestionNo9','$theQuestionNumber9', '$counter', '$newQuizNo')";
   $dbResultQ9=mysql_query($dbQueryQ9);
   
   $dbQueryFindQ10 = "SELECT question_no From questions where question_text = '$theQuestion10'";
   $dbResultFindQ10 = mysql_query($dbQueryFindQ10);
   $dbRowQ10=mysql_fetch_array($dbResultFindQ10);
   $theQuestionNumber10 = $dbRowQ10["question_no"];
   
   $counter++;
   $setQuestionNo10 = $theLastNo+$counter; 

   $dbQueryQ10="insert into setofquestions values ('$setQuestionNo10','$theQuestionNumber10', '$counter', '$newQuizNo')";
   $dbResultQ10=mysql_query($dbQueryQ10);   
   
   $message="New quiz was added";
   }//if
?>
<html>

<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Add Quiz</title>
	
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
		    <a href="adminhomepage.php" class="btn btn-success" role="button">My Homepage</a>
			<a href="homepage.html" class="btn btn-danger" role="button">Log Out</a>		  
			<a href="leaderboard.php" class="btn btn-warning" role="button">Leaderboard</a>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
	
	 <div class="container">
      <div class="starter-template">
<?php echo "<h1>$message</h1> 
    <a href='addQuiz.php?x=$adminNumber'>Click to add another quiz</a>";?>
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

<?php

} else {
  
?>
<html>

<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Add Quiz</title>
	
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
	
	
	  <script type="text/javascript">
    function checkForm() {
      if (document.NewQuestion.questionText.value=="") {
         alert("Please provide text for the question");
         return false;
      }
      return true;
    }
  </script>
	
	
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
		    <a href="adminhomepage.php" class="btn btn-success" role="button">My Homepage</a>
			<a href="homepage.html" class="btn btn-danger" role="button">Log Out</a>		  
			<a href="leaderboard.php" class="btn btn-warning" role="button">Leaderboard</a>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
	
	 <div class="container">
      <div class="starter-template">
	  
	  
	<h1>Add new quiz</h1>
  <form name="addQuiz" method="post" action="addQuiz.php" 
        onsubmit="return checkForm()">

  <h4>Quiz Title</h4>
  <input type="text" name="quiz_title"><br><br>

  <table class="table">
	  <tr>
	<td>Question No.</td>
    <td>Select Question</td>
  </tr>
  <tr>
<?php
	$adminNumber = $_GET["x"];
	$count = 0;
	include ("dbConnect.php");
while ($count <10){
	$count++;
	echo"<td>
	$count
	</td>
	<td>
  <input list = '$count' name = '$count'>
  <datalist id='$count'>";
  
  $dbQuery="SELECT question_text FROM questions";
  $dbResult=mysql_query($dbQuery);
  
  if($dbResult === FALSE) {
    die(mysql_error()); // TODO: better error handling
  }

  while ($dbRow=mysql_fetch_array($dbResult)) {
     $theQuestion=$dbRow["question_text"];
     echo "<option name = '$count' value = '$theQuestion 'maxlength='1000'><br>";

  }//while
  
   echo" </datalist> 
  </td>
  </tr>";
  
}//while

echo "<input type='hidden' name='admin' value='$adminNumber'>";
?>



</table>
<br>
  
  
  <input type="hidden" name="action" value="addQuiz">
  <input type="submit" value="Add Quiz">

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

<?php
}
?>