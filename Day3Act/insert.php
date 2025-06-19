<?php
$servername = "localhost";
$username = "mcreadz";
$password = "6548103297";
$dbname = "calculator";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$postget1 = $_POST['name1'];
$postget2 = $_POST['email1'];
$postget3 = $_POST['val1'];
$postget4 = $_POST['val2'];
$postget5 = $_POST['ans1'];
$postget6 = $_POST['operation1'];
$opp = $postget3 . $postget6 . $postget4 . " =";

date_default_timezone_set('Asia/Manila');

$td = date("Y-m-d",time()) . " " . date("h:i:sa");

$sql = "INSERT INTO formsubmit (guest2, email2, operation2, answer2, timedate2)
VALUES ('$postget1', '$postget2', '$opp', '$postget5', '$td')";

if ($conn->query($sql) === TRUE) {
  header("location: 2valcalc.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 