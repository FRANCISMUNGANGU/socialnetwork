<!DOCTYPE html>
<html>
    <head>
        <title>Log in page</title>
    </head>
<body>
    <form method = "POST" action = "lib/login.php">
        <p style="color:red;">

            <?php

            echo $_GET['msg'];

            ?>


        </p>


       EMAIL:<br> <input type = "email" name = "email" placeholder = "Enter your email"  /><br><br>
       PASSWORD: <br><input type = "password" name = "password" placeholder = "xxxxxxxx"  /><br><br>
       <input type = "submit" value = "Log in"/>
    
    </form><br>
    <a href="signup.php">Sign up</a>
</body>
</html>