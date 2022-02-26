<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dispecer";
$carrier=$_POST['carrier'];
$name=$_POST['name'];
$rpm=$_POST['rpm'];
$dhrpm=$_POST['dhrpm'];
$date=$_POST['date'];
$day=$_POST['day'];
$weekRev=$_POST['weekRev'];
$miles=$_POST['miles'];
$dh=$_POST['dh'];
$load=$_POST['load'];
$ref=$_POST['ref'];
$message=$_POST['message'];







// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO report (carrier, name, rpm,dhrpm,date,day,week_rev,miles,dh,load_dis,ref,message)
VALUES ('$carrier', '$name', '$rpm','$dhrpm','$date','$day','$weekRev','$miles','$dh','$load','$ref','$message');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    
  
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>