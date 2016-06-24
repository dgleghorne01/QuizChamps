<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Leaderboard</title>

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
			
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

	  <div class="container">
  <h2>Leaderboard</h2>
  <p>The top table...</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Position</th>
		<th>Username</th>
        <th>Total Score</th>
        <th>Number of quizzes taken</th>
      </tr>
    </thead>
	<tbody>
	
<?php
  include ("dbConnect.php");
  //Set counter for the position
  $count = 0;
  //Get the member's name
  $dbQuery="select username from members order by total_member_score desc";
  $dbResult=mysql_query($dbQuery);
  //Get the member's score
  $dbQuery2="select total_member_score from members order by total_member_score desc";
  $dbResult2=mysql_query($dbQuery2);
  //Get the total number of quizzes taken
  $dbQuery3="select tot_num_quiz_taken from members order by total_member_score desc";
  $dbResult3=mysql_query($dbQuery3);

  while ($dbRow=mysql_fetch_array($dbResult)) {
     $dbRow2=mysql_fetch_array($dbResult2);
	 $dbRow3=mysql_fetch_array($dbResult3);
	 
	 $count++;
	 $theUsername=$dbRow["username"];
	 $theScore=$dbRow2["total_member_score"];
	 $theNumberofQuizzes=$dbRow3["tot_num_quiz_taken"];
     echo "<tr>
	    <td>$count</td>
        <td>$theUsername</td>
		<td>$theScore</td>
        <td>$theNumberofQuizzes</td></tr>";
  }
?>
    </tbody>
  </table>
</div>


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