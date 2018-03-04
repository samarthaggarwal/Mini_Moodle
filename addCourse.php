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

  // $sam = date('Y-m-d H:i:s');
  // echo $sam."<br>";
  // $timestamp=strtotime($sam);
  // echo $timestamp."<br>";
  // $timestamp = $timestamp + 12;
  // echo $timestamp."<br>";

  $coursename=$_POST["coursename"];
  $sql="insert into reg (course) values (\"$coursename\")";

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
