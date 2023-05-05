<!DOCTYPE html>
<html>
    <head>
        <title>Sign up page</title>
    </head>
<body>
    <form method = "POST" action = "lib/signup.php">
        <h3>CREATE ACCOUNT</h3>



        <p style="color:red;">

            
        <?php
            echo $_GET['msg'];
        ?>



        </p>

        <p style="color:green;">

            
        <?php
            echo $_GET['success'];
        ?>



        </p>


        
       NAME: <br><input type = "text" name = "name" placeholder = "Enter your name"  /><br><br>
       EMAIL:<br> <input type = "email" name = "email" placeholder = "Enter your email"  /><br><br>
       PHONE:<br> <input type = "number" name = "phone" placeholder = "07xxxxxxxx"  /><br><br>
       PASSWORD: <br><input type = "password" name = "password" placeholder = "xxxxxxxx"  /><br><br>
       CONFIRM PASSWORD: <br><input type = "password" name = "cpassword" placeholder = "xxxxxxxx"  /><br><br>
       <input type = "submit" value = "Create account"/>
    
    </form><br>
    <a href="index.php">log in</a>
</body>
</html>