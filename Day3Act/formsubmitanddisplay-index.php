<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Page Title</title>
<meta name="viewport" content="width=device-width,initial-scale=1">

</head>
<body>

<form action="insert-demodb.php" method="POST">
Name: <input type="text" name="person"><br>
E-Mail: <input type="text" name="email"><br>
Points: <input type="text" name="points"><br>
<input type="submit">
</form>

<?php
    $servername = "localhost";
    $username = "mcreadz";
    $password = "6548103297";
    $dbname = "demodb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT id, person, email, points FROM formsubmit";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo $row["id"] . " " . $row["person"] . " " . $row["email"] . " " . $row["points"] . "<br>";
        }
    } else {
        echo "No data found";
    }

    $conn->close();
?>

</body>
</html> 