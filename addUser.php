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

  $username=$_POST["username"];
  $password=$_POST["password"];
  $usertype=$_POST["usertype"];
  $sql="insert into login values (\"$username\",\"$password\",\"$usertype\")";

  if($conn->query($sql)===true){
    echo "<br>successful query<br>".$sql;
  }
  else {
    echo "<br>error in entering data to db :<br>".$conn->error;
  }

  if ($usertype="student") {
    $sql2 = "alter table reg add $username timestamp null";
    echo $sql2;
    if($conn->query($sql)===true){
      echo "<br>successful added column<br>".$sql;
    }
    else {
      echo "<br>error in adding student to reg :<br>".$conn->error;
    }
  }

  $newURL="admin.php";
  header('Location: '.$newURL);
  die();

  $conn->close();
?>
