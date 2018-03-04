<html>
   <head>
      <title>Professor's Page</title>
   </head>

   <body>

     <form action="addCourse.php" method="post">
       Course Name : <br>
 		  <input type="text" name="coursename">
 		  <br>
      <input type="submit" value="Add Course">
     </form>

     <br><br><br>

    <form action="addMessage.php" method="post">
		  Course Name :<br>
		  <input type="text" name="coursename">
		  <br>
		  Message :<br>
      <textarea name="message" rows="5" cols="50"></textarea><br>
      <br><br>
		  <input type="submit" value="Post Message">
		</form>

    <br><br>
    <a href="login.php">logout</a>
   </body>
</html>
