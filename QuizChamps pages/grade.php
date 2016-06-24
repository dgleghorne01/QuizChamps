<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Your Score!</title>

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

		<h1>Your Score!</h1>
		
        <?php
            
			include ("dbConnect.php");
			
            //Post of the user's member Number, the quiz number & quizAttemptNumber
			$member_no = $_POST['memberNumber'];
			$theQuizNumber =$_POST['quizNumber'];
			$quizAttemptNumber =$_POST['quizAttemptNumber'];
			
			//Post user's inputted answers for each question
			$answer1 = $_POST['1'];
            $answer2 = $_POST['2'];
            $answer3 = $_POST['3'];
            $answer4 = $_POST['4'];
            $answer5 = $_POST['5'];
			$answer6 = $_POST['6'];
			$answer7 = $_POST['7'];
			$answer8 = $_POST['8'];
			$answer9 = $_POST['9'];
			$answer10 = $_POST['10'];
			//Post the correct answers for each question
			$theAnswer1 =$_POST['101'];
			$theAnswer2 =$_POST['102'];
			$theAnswer3 =$_POST['103'];
			$theAnswer4 =$_POST['104'];
			$theAnswer5 =$_POST['105'];
			$theAnswer6 =$_POST['106'];
			$theAnswer7 =$_POST['107'];
			$theAnswer8 =$_POST['108'];
			$theAnswer9 =$_POST['109'];
			$theAnswer10 =$_POST['110'];
			//Post for the points awarded for each question
			$thePoints1 =$_POST["201"];
			$thePoints2 =$_POST["202"];
			$thePoints3 =$_POST["203"];
			$thePoints4 =$_POST["204"];
			$thePoints5 =$_POST["205"];
			$thePoints6 =$_POST["206"];
			$thePoints7 =$_POST["207"];
			$thePoints8 =$_POST["208"];
			$thePoints9 =$_POST["209"];
			$thePoints10 =$_POST["210"];
        
            //initialise the starting raw score and adjusted score to zero
			$totalCorrect = 0;
			$totalScore = 0;
		
            //Calculate raw score (total correct), adjustedScore (totalScore)
            if ($answer1 == "$theAnswer1") { $totalCorrect++; $totalScore = ($totalScore+$thePoints1);}
            if ($answer2 == "$theAnswer2") { $totalCorrect++; $totalScore = ($totalScore+$thePoints2);}
            if ($answer3 == "$theAnswer3") { $totalCorrect++; $totalScore = ($totalScore+$thePoints3);}
            if ($answer4 == "$theAnswer4") { $totalCorrect++; $totalScore = ($totalScore+$thePoints4);}
            if ($answer5 == "$theAnswer5") { $totalCorrect++; $totalScore = ($totalScore+$thePoints5);}
			if ($answer6 == "$theAnswer6") { $totalCorrect++; $totalScore = ($totalScore+$thePoints6);}
			if ($answer7 == "$theAnswer7") { $totalCorrect++; $totalScore = ($totalScore+$thePoints7);}
			if ($answer8 == "$theAnswer8") { $totalCorrect++; $totalScore = ($totalScore+$thePoints8);}
			if ($answer9 == "$theAnswer9") { $totalCorrect++; $totalScore = ($totalScore+$thePoints9);}
			if ($answer10 == "$theAnswer10") { $totalCorrect++; $totalScore = ($totalScore+$thePoints10);}
            
			//Display the raw score out of ten
            echo "<div id='results'>$totalCorrect / 10 correct</div>";
			
			//Adjust the score depending on number of attempts at this quiz
			$totalScore = $totalScore*(1/$quizAttemptNumber);
			
			//Set max points
			$maxPoints = $thePoints1+$thePoints2+$thePoints3+$thePoints4+$thePoints5+$thePoints6+$thePoints7+$thePoints8+$thePoints9+$thePoints10;
			
			//Display the adjusted score
			echo "<div id='results'>$totalScore / $maxPoints points for the leaderboard</div>";
			
			//Create a new attempt with the quiz_no, member_no, raw score, adjusted score and the number of times the quiz has been attempted by this user
			$dbQueryAttempt="insert into attempt values (null,'$theQuizNumber', '$member_no', '$totalCorrect', '$totalScore', '$quizAttemptNumber')";
			$dbResultAttempt=mysql_query($dbQueryAttempt);
			//Add the attempt to the member's total and update the member's total score
			$dbQueryUpdateMember ="UPDATE members SET total_member_score = total_member_score + $totalScore ,tot_num_quiz_taken = tot_num_quiz_taken+1 WHERE member_no = $member_no";
            $dbResultUpdateMember=mysql_query($dbQueryUpdateMember);
        ?>
	
	</div>
	</div>
	
	<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	var pageTracker = _gat._getTracker("UA-68528-29");
	pageTracker._initData();
	pageTracker._trackPageview();
	</script>
	
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