<?php
if (isset($_POST["action"]) && $_POST["action"]=="addQuestion") {

   include ("dbConnect.php");

   $theQuestionText=$_POST["questionText"];
   $theCorrectText=$_POST["correctText"];
   $theWrong1Text=$_POST["wrong1Text"];
   $theWrong2Text=$_POST["wrong2Text"];
   $theWrong3Text=$_POST["wrong3Text"];
   $theQuestionGenre=$_POST["questionGenre"];
   $theQuestionLevel=$_POST["questionLevel"];
   $theQuestionType=$_POST["questionType"];
   
   //Get last number of the answerlist
   $dbQuery1="SELECT MAX(answerlist_no) FROM answerlist";
   $dbResult1=mysql_query($dbQuery1);
   $dbRow=mysql_fetch_array($dbResult1);
   $theLastNo=$dbRow["MAX(answerlist_no)"];
   
   //Add the new answerlist
   $answerNo = $theLastNo+1;
   $dbQuery2="insert into answerlist values ('$answerNo','$theCorrectText', '$theWrong1Text', '$theWrong2Text', '$theWrong3Text')";
   $dbResult2=mysql_query($dbQuery2);
   
   //Find the score to be added
   if($theQuestionLevel == 1){
	   $theScore = 1;
   }
   else if ($theQuestionLevel == 2){
	   $theScore = 2;
   }
   else{
	   $theScore = 4;
   }
 
   //Add the new question
   $dbQuery="insert into questions values ($answerNo,'$answerNo', '$theQuestionGenre', '$theQuestionType', '$theQuestionLevel', '$theQuestionText','$theScore')";
   $dbResult=mysql_query($dbQuery);
   $message="New question was added";
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

    <title>Add Question</title>
	
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
<?php echo "<h1>$message</h1>"; ?>
    <a href="addQuestion.php">Click to add another question</a>
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

    <title>Add Question</title>
	
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
	  
	<h1>Add new question</h1>
  <form name="newQuestion" method="post" action="addQuestion.php" 
        onsubmit="return checkForm()">

  <h4>Question text</h4>
  <input type="text" name="questionText"><br><br>
  <h4>Correct Answer text</h4>
  <input type="text" name="correctText">
  <h4>Wrong Answer 1 text</h4>
  <input type="text" name="wrong1Text">
  <h4>Wrong Answer 2 text <br>(Not needed for True or False)</h4>
  <input type="text" name="wrong2Text">
  <h4>Wrong Answer 3 text <br>(Not needed for True or False)</h4>
  <input type="text" name="wrong3Text">
  <h4>Question genre</h4>
  <input type="radio" name="questionGenre" value = "2">General Knowledge<br>
  <input type="radio" name="questionGenre" value = "1">Sport<br>
  <input type="radio" name="questionGenre" value = "3">Music<br>
  <input type="radio" name="questionGenre" value = "4">History<br>
  <input type="radio" name="questionGenre" value = "5">Geography<br>
  <input type="radio" name="questionGenre" value = "6">TV/Film<br>
  <input type="radio" name="questionGenre" value = "7">Religion<br>
  <input type="radio" name="questionGenre" value = "8">Literature<br><br>
  <h4>Question level</h4>
  <input type="radio" name="questionLevel" value = "1">Easy<br>
  <input type="radio" name="questionLevel" value = "2">Medium<br>
  <input type="radio" name="questionLevel" value = "3">Difficult<br><br>
  <h4>Question type</h4>
  <input type="radio" name="questionType" value = "1">True or False<br>
  <input type="radio" name="questionType" value = "2">Multiple Choice<br><br>
  <input type="hidden" name="action" value="addQuestion">
  <input type="submit" value="Add">

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