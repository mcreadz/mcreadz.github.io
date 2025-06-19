<?php
$servername = "localhost";
$username = "mcreadz";
$password = "6548103297";
$dbname = "demodb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, lname, fname, Age, Sex FROM family";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["id"] . " " . $row["lname"] . " " . $row["fname"] . " " . $row["Age"] . " " . $row["Sex"]. "<br>";
    }
} else {
    echo "No data found";
}

$conn->close();
?>