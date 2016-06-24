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

    <title>User Homepage</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

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
         	<a href="homepage.html" class="btn btn-danger" role="button">Log Out</a>
			<a href="leaderboard.php" class="btn btn-warning" role="button">Leaderboard</a>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        
<?php
  $member_no = 1;
  
  include ("dbConnect.php");
  $dbQuery="select username from members where member_no = $member_no";
  $dbResult=mysql_query($dbQuery);
  
  if($dbResult === FALSE) {
    die(mysql_error()); // TODO: better error handling
  }

  while ($dbRow=mysql_fetch_array($dbResult)) {
     $theUsername=$dbRow["username"];
     echo "<h1>Welcome back $theUsername</h1>";
  }

echo"
        <p>Take a new quiz and climb up the leaderboard</p>
        <p><a class='btn btn-primary btn-lg' href='#' role='button'>Learn more &raquo;</a></p>
      </div>
    </div>

    <div class='container'>
      <!-- Example row of columns -->
      <div class='row'>
        <div class='col-md-4'>
          <h2>Genre</h2>
          <p>Find a quiz based on a particular genre or topic.</p>
          <p><a class='btn btn-default' href='quizByGenre.php?x=$member_no' role='button'>View List &raquo;</a></p>
        </div>
		
        <div class='col-md-4'>
          <h2>Level</h2>
          <p>Select a quiz based on the level of questions it contains.  Easy, Medium or Hard.  The harder the question the more points you gain for the leaderboard!</p>
          <p><a class='btn btn-default' href='quizByLevel.php?x=$member_no' role='button'>View List &raquo;</a></p>
       </div>

        <div class='col-md-4'>
          <h2>Type</h2>
          <p>Find quizzes that have all the same type of questions.  Choose either True or False, or Multiple Choice. </p>
          <p><a class='btn btn-default' href='quizByType.php?x=$member_no' role='button'>View List &raquo;</a></p>
        </div>
      </div>";
?>

      <hr>

      <footer>
        <p>&copy; 2016 Banter Quizzes, Inc.</p>
      </footer>
    </div> <!-- /container -->


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