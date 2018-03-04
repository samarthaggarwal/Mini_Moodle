<html>
   <head>
      <title>Student's Page</title>
   </head>

   <body>

     <h1>Messages</h1>

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

     $username = $_GET['username'];
           // echo $username;
           // echo "<br><br>";

     // $sql = "select * from reg where course=\"cvl100\"";
     // echo $sql."<br>";
     //
     // $result = $conn->query($sql);
     // print_r($result);
     // echo "<br>".$result->num_rows." rows in result<br>";

      $sql = "select course,$username from reg where $username is not null";
      // echo $sql."<br>";
      $result = $conn->query($sql);

      // print_r($result);
      // echo "<br>";

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            // print_r($row);
            // echo "<br> course: ". $row['course'] . "<br> time : " . $row[$username] . "<br>";
            $course = $row['course'];
            $time = $row[$username];

            $sql2 = "select message from messages where course=\"$course\" and time > \"$time\"";
            //  echo $sql2."<br>";
            $res = $conn->query($sql2);
            // echo $res."<br>";
            // print_r($res);

            if($res->num_rows > 0) {
              while($r = $res->fetch_assoc()) {
                echo $course." : ".$r['message']."<br>";
              }
            }
            // foreach ($res->fetch_assoc() as $value) {
            //     echo $value['message']."<br>";
            // }
        }
      } else {
        // echo "0 results";
      }

      $conn->close();
     ?>

     <br><br>
     <h1>Courses</h1>

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

         $username = $_GET['username'];
         $sql = "select course, $username from reg";
         $result = $conn->query($sql);

         // print_r($result);
         if($result->num_rows > 0) {
           while($row = $result->fetch_assoc()) {
             echo $row['course'];
             $course = $row['course'];
             // echo isnull($row[$username]);
             if( $row[$username]==null ){
               $redirect_url = "register.php?username=$username&course=$course";
               echo "&nbsp&nbsp <a href=\"$redirect_url\">register</a><br>";

               // echo "<form method=\"GET\" action=\"". header('Location: '.$redirect_url) ."\">
               //    <input type=\"submit\" name=\"submit\" value=\"deregister\">
               // </form>";
               // echo "<form method=\"GET\" action=\"$redirect_url\">
               //    <input type=\"submit\" name=\"submit\" value=\"Register\" username=\"$username\">
               // </form>";

             }else{
               $redirect_url = "deregister.php?username=$username&course=$course";
               echo " &nbsp&nbsp <a href=\"$redirect_url\">deregister</a><br>";

               // echo "<form method=\"GET\" action=\"". header('Location: '.$redirect_url) ."\">
               //    <input type=\"submit\" name=\"submit\" value=\"deregister\">
               // </form>";

               // echo "<form method=\"GET\" action=\"$redirect_url\">
               //    <input type=\"submit\" name=\"submit\" value=\"deregister\" username=\"$username\">
               // </form>";
             }
             echo "<br><br>";
           }
         }

         $logout = "login.php";
         echo "<br><br><br><a href=\"$logout\">logout</a><br>";

         $conn->close();
     ?>

   </body>
</html>
