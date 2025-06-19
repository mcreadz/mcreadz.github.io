<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>2 Value Calculator</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

</head> 
<body>

<?php
$servername = "localhost";
$username = "mcreadz";
$password = "6548103297";
$dbname = "calculator";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT id, guest2, email2, operation2, answer2, timedate2 FROM formsubmit";
$result = $conn->query($sql);

?>

<div class="container pt-5">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="text-center h1 pt-2 pb-4">
        Two Value Calculator
      </div>
      
    </div>
    
  </div>

  <div class="row">
    <div class="col-md-4 mx-auto text-center">  
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Open Calculator
        </button>
    </div>
  </div>
</div>

<div class="row-fluid mt-5">
  <div class="col-md-8 col-xs-6 mx-auto">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">E-Mail</th>
            <th class='text-center' scope="col">Statement</th>
            <th class='text-center' scope="col">Answer</th>
            <th scope="col">Timestamp</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                    echo "<th scope='row'>" . $row["id"] . "</th>";
                    echo "<td>" . $row["guest2"] . "</td>";
                    echo "<td>" . $row["email2"] . "</td>";
                    echo "<td class='text-center'>" . $row["operation2"] . "</td>";
                    echo "<td class='text-center'>" . $row["answer2"] . "</td>";
                    echo "<td>" . $row["timedate2"] . "</td>";
                  echo "</tr>";
                }
            } else {
                echo "No data found";
            }
          ?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Welcome Guest!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="insert.php" method="POST">
          <div class="mb-3">
            <input type="text" class="form-control" name="name1" aria-describedby="nameHelp" placeholder="Name" required>
          </div>
          <div class="mb-3">
            <input type="email" class="form-control" name="email1" aria-describedby="emailHelp" placeholder="E-mail" required>
          </div>
          <div class="input-group mb-3 text-center">
            <input type="text" onkeypress="return /[.0-9]/i.test(event.key)" id="num1" name="val1" class="form-control" placeholder="value 1" style="text-align: center;">
            <span id="numop" class="input-group-text">Select Operator</span>
            <input type="text" onkeypress="return /[.0-9]/i.test(event.key)" id="num2" name="val2" class="form-control" placeholder="value 2" style="text-align: center;">
          </div>
          <div class="mb-3">
            <button type="button" onclick="calcAdd()" class="btn btn-warning">+</button>
            <button type="button" onclick="calcSub()" class="btn btn-warning">-</button>
            <button type="button" onclick="calcMul()" class="btn btn-warning">x</button>
            <button type="button" onclick="calcDiv()" class="btn btn-warning">/</button>
          </div>
          <div class="input-group">
            <span class="input-group-text">Answer </span>
            <input type="text" id="ans0" name="ans1" class="form-control" readonly>
          </div>
          <div class="pt-3">
            <input type="hidden" name="operation1">
            <input type="submit" class="btn btn-primary" value="Submit Result">
          </div>         
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="clearVal()" class="btn btn-danger">clear</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
<script src="index.js"></script> 
<?php 
  $conn->close();
?>
</body>
</html> 