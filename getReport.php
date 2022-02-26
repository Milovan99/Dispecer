<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dispecer";

$name=$_POST['name'];
$date=$_POST['date'];






// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "
SELECT * FROM report
WHERE date BETWEEN '$date' AND DATE_ADD('$date', INTERVAL 7 DAY) AND name='$name'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
<title>Dispecer</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Dispecer</a>
    </div>
    
    <ul class="nav navbar-nav navbar-right">
    <li><form class="navbar-form navbar-left" action="getUpdate.php" method="post">
      <div class="form-group">
        <input type="text" name="id_report" class="form-control" placeholder="ID Report">
      </div>
      <button type="submit" class="btn btn-danger">Edit</button>
    </form></li>
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="report.php">Report</a></li>
      <li><a href="update.php">Update</a></li>
    </ul>
    
  </div>
</nav>

    <table class="table table-striped">
  <thead>
    <tr>
	  <th scope="col">ID Report</th>
      <th scope="col">Carrier</th>
      <th scope="col">Name</th>
      <th scope="col">RPM</th>
      <th scope="col">DHRPM</th>
      <th scope="col">Date</th>
      <th scope="col">Day</th>
      <th scope="col">Week Rev</th>
      <th scope="col">Miles</th>
      <th scope="col">DH</th>
      <th scope="col">Load</th>
      <th scope="col">Ref</th>
     
    </tr>
  </thead>
  <tbody>
  <?php 
  if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        
        echo "<tr><td>". $row["id_report"]. "</td><td>". $row["carrier"]. "</td><td>" . $row["name"]. "<td>" . $row["rpm"]. "</td><td>".$row["dhrpm"].
        "</td>". "</td><td>".$row["date"]."</td>". "</td><td>".$row["day"]."</td>". "</td><td>".$row["week_rev"]."</td>". 
        "</td><td>".$row["miles"]."</td>". "</td><td>".$row["dh"]."</td>". "</td><td>".$row["load_dis"]."</td>". 
        "</td><td>".$row["ref"]."</td></tr>";
    }
  } else {
      echo "0 results";
  }
$conn->close();
?>
</tbody></table>

</body>
</html>