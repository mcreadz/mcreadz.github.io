<?php
$servername = "localhost";
$username = "mcreadz";
$password = "6548103297";
$dbname = "demodb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$postget1 = $_POST['person'];
$postget2 = $_POST['email'];
$postget3 = $_POST['points'];


$sql = "INSERT INTO formsubmit (person, email, points)
VALUES ('$postget1', '$postget2', '$postget3')";

if ($conn->query($sql) === TRUE) {
  header("location: formsubmitanddisplay-index.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 