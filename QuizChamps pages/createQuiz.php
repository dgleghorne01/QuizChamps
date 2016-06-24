<html>

<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Create Quiz</title>
	
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
<?php
$memberNumber = $_GET["x"];
?>	 

      <div class="starter-template">
	  
	  <p>Here you can create a new quiz.  If you would like to use the questions already in the question bank select "Use existing questions".</p><br>
	  <p>If you would like to add some new questions to your quiz then select "Use new questions".  You can still use the questions from the question bank too.<p><br>
	  
	  <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select quiz maker format
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#Existing">Use existing questions</a></li>
    <li><a href="#New">Use new questions</a></li>

  </ul>
</div>


<a NAME="Existing">
<h2>Create Quiz with existing questions</h2>
</a>

<h3>Search for questions by criteria:</h3>
<form action="createQuiz.php">
	  <table class="table">
	  <tr>
	<td>Genre</td>
    <td>Type</td>
	<td>Level</td>
	<td></td>
  </tr>
  <tr>
	<td>
	<select>
  <option value="Any">Any</option>
  <option value="GeneralKnowledge">General Knowledge</option>
  <option value="Sport">Sport</option>
  <option value="Music">Music</option>
  <option value="History">History</option>
  <option value="Geography">Geography</option>
  <option value="TV">TV/Film</option>
  <option value="Religion">Religion</option>
  <option value="Literature">Literature</option>
	</select>
</td>
<td>
	<select>
	<option value="Any">Any</option>
	<option value="TF">True or False</option>
  <option value="Multi">Multiple Choice</option>
  </select>
 </td>
	<td>
	<select>
	<option value="Any">Any</option>
	<option value="Easy">Easy</option>
  <option value="Medium">Medium</option>
  <option value="Difficult">Difficult</option>
  </select>
  </td>
	<td> <input type="submit" value ="Update"></td>
  </tr>
  </table>

  
</form>
	  
	  
	  <table class="table">
	  <tr>
	<td>Question No.</td>
    <td>Select Question</td>
  </tr>
  <tr>
	  <form action="addQuiz.php">
<?php
	
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
     echo "<option name = '$count' value = '$theQuestion'><br>";

  }//while
  
   echo" </datalist> 
  </td>
  </tr>";
  
}//while
?>



</table>
<br>
  <input type="submit" value ="Submit Quiz">
  
</form>

<a NAME="New">
<h2>Create Quiz with new and existing questions</h2>
</a>
	  



	  
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