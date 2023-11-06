<?php

//connect to database
require_once( $_SERVER['DOCUMENT_ROOT']."/socialnetwork/config/db.php");
require_once( $_SERVER['DOCUMENT_ROOT']."/socialnetwork/config/functions.php");

// read form data
$name = mysqli_real_escape_string($connection, $_POST['name']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$phone = mysqli_real_escape_string($connection, $_POST['phone']);
$password = mysqli_real_escape_string($connection, $_POST['password']);
$cpassword = mysqli_real_escape_string($connection, $_POST['cpassword']);
//conditional for validating user inputs
if(empty($name) OR empty($email) OR empty($phone) OR empty($password) OR empty($cpassword))
{
   header("location:../signup.php?msg=Please fill all fields");
   die();
}
//checking password is similar to confirm password
if($password !== $cpassword)
{
    header("location:../signup.php?msg=Passwords do not match");
    die();
}
//checking password length
if(strlen($password) < 6)
{
    header("location:../signup.php?msg=Password should be 6 characters long");
    die();
}

//insert form data to database
$created = date('d-M-Y');
$hash = md5($password);
//validation of email
$duplicateCheck = mysqli_query(
    $connection,
    "SELECT * FROM `users` WHERE `email` = '$email'"
);
$existingRecords = mysqli_num_rows($duplicateCheck);
if($existingRecords > 0)
{
    header("location:../signup.php?msg=The email already exists, please try another one");
    die();
}
$insert = mysqli_query(

    $connection,
    "INSERT INTO `users`(`name`, `email`, `password`, `phone`, `created`)
                  VALUES('$name','$email', '$hash', '$phone','$created')"
);
if($insert)
{
    header("location:../signup.php?success=Record inserted successfully");
    $formatPhonenumber = "+254".substr($phone, -9);
    $message = "Thank you ".$name." for joining my platform";
    sendMessage($formatPhonenumber, $message);
    die();
}
?>