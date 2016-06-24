<html>

<head>
<title>List All Questions</title>
</head>

<body>

<?php

include ("dbConnect.php");

$dbQuery="select * from questions order by question_text asc";
$dbResult=mysql_query($dbQuery);
$numberOfQuestions=mysql_num_rows($dbResult);

echo "<h1>$numberOfQuestions questions are available</h1>".
     "<ul>";

while ($dbRow=mysql_fetch_array($dbResult)) {
  $theQuestionNo=$dbRow["question_no"];
  $theQuestion=$dbRow["question_text"];
  echo "<li><a question_no=$theQuestionNo\">$theQuestion</a></li>";
}

echo "</ul>";
?>

</body>

</html>