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
    echo "connected to database ".$dbname."<br>";
  }

  print_r($_POST);
  echo "<br>";

  $username=$_POST["username"];
  $password=$_POST["password"];

  $result = $conn->query("select * from login where (username='$username' and password='$password')");
  if($result->num_rows == 0) {
     echo "invalid username or password<br>";
     $newURL="login.php";
     header('Location: '.$newURL);
     die();
  } else {
      echo "access granted<br>";
      $row = mysqli_fetch_assoc($result);
      $userType = $row['type'];
      if(!strcmp($userType,"prof")) {
        // echo "111";
        $newURL="prof.php";
        header('Location: '.$newURL);
        die();
      } elseif (!strcmp($userType,"student")) {
        // echo "222";
        $newURL="student.php?username=$username";
        header('Location: '.$newURL);
        die();
      } elseif (!strcmp($userType,"admin")) {
        // echo "333";
        $newURL="admin.php";
        header('Location: '.$newURL);
        die();
      } else{
        echo "undefined user type :".$userType;
      }
  }

  // while($row = mysqli_fetch_assoc($result)){
  //       $stringTest = $row['type'];
  //       echo $stringTest;
  //       print_r($row);
  // }
die();

  $conn->close();
?>
