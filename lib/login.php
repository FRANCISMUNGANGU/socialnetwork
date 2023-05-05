<?php
//connection to db
require_once('../config/db.php');
//creating a session
session_start();
//connect to database
$connection = mysqli_connect('localhost', 'root', '','socialnetwork');
if(!$connection)
{
    header("location:../index.php?msg=10001>>something went wrong");
    die();
}
$email = mysqli_real_escape_string($connection, $_POST['email']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

//validating if password is empty

if(empty($email) OR empty($password))
{
    header("location:../index.php?msg=Please fill all fields");
    die();
}

//validating the user exists
$hash = md5($password);
//validation of email
$checkExists = mysqli_query(
    $connection,
    "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$hash'"
);
$existingRecords = mysqli_num_rows($checkExists);
if($existingRecords > 0)
{
    $_SESSION['loggedin'] = $email;
    header("location:../profile.php");
} else
{
    header("location:../index.php?msg=Email or password is wrong");
    die(); 
}

?>