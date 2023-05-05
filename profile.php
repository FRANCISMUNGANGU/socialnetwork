<?php
session_start();
if(!isset($_SESSION['loggedin']))
{
    header("index.php");
    die();
}

require_once('config/db.php');
$loggedUser = $_SESSION['loggedin'];
//to get user details
$select = mysqli_query(
    $connection,
    "SELECT * FROM `users` WHERE `email` = '$loggedUser'"
);
$user = mysqli_fetch_array($select);
?>


<!DOCTYPE html>
<html>
<head>
<title>
    <?php
    echo $user['name'];
    ?>
</title>
</head>
    <body>
        <h3>
            Name:
            <?php
            echo $user['name'];
            ?>
        </h3>
        <h3>
            Email:
            <?php
            echo $user['email'];
            ?>
        
        </h3>
        <h3>
            Phone:
            <?php
            echo $user['phone'];
            ?>
        
        </h3>
        <h3>
            Created:
            <?php
            echo $user['created'];
            ?>
        </h3>
        <a href="lib/logout.php">Click here to log out</a>
    </body>
</html>