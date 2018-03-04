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
    echo "connected to database ".$dbname;
  }

  $coursename=$_POST["coursename"];
  $message = $_POST["message"];
  $sql="insert into messages (course,message,time) values (\"$coursename\",\"$message\",current_timestamp)";

  if($conn->query($sql)===true){
    echo "<br>successful query<br>".$sql;
  }
  else {
    echo "<br>error in entering data to db :<br>".$conn->error;
  }

  $newURL="prof.php";
  header('Location: '.$newURL);
  die();

  $conn->close();
?>
