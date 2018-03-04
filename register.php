<?php
$servername = "localhost";
$username = "root";
$password = "abc";
$dbname = "db_mini_moodle";

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
  die("Connection to database failed : ".$conn->error);
}
else {
 // echo "connected to database ".$dbname;
}
print_r($_GET);
$course = $_GET['course'];
$username = $_GET['username'];
echo "username : ".$username." course : ".$course;

$sql = "update reg set $username=current_timestamp where course=\"$course\"";
$conn->query($sql);

$newURL="student.php?username=$username";
header('Location: '.$newURL);
die();
$conn->close();
 ?>
