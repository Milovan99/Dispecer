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
$id_report=$_POST['id_report'];






// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE report SET carrier='$carrier', name='$name', rpm='$rpm',dhrpm='$dhrpm',date='$date',day='$day',week_rev='$weekRev',miles='$miles',dh='$dh',load_dis='$load',ref='$ref',message='$message' 
WHERE id_report='$id_report'";

if ($conn->query($sql) === TRUE) {
    echo "New record updated successfully";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>