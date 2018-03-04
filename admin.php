<html>
   <head>
      <title>Admin's Page</title>
   </head>

   <body>

     <form action="addUser.php" method="post">
       Username :
 		  <input type="text" name="username">
 		  <br>
      Password :
     <input type="text" name="password">
     <br>
     User Type :
         <select name="usertype">
             <option value="prof">Professor</option>
             <option value="student">Student</option>
             <option value="admin">Admin</option>
         </select>
         <br><br>
          <input type="submit" value="Add User">
     </form>

    <br><br>
    <a href="login.php">logout</a>
   </body>
</html>
