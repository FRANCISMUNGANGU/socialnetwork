<?php
// date
date_default_timezone_set("Africa/Nairobi");
//database session
session_start();
if(!isset($_SESSION['loggedin']))
{
    header("location:/socialnetwork/index.php");
    die();
}
require_once( $_SERVER['DOCUMENT_ROOT']."/socialnetwork/config/db.php");
$loggedUser = $_SESSION['loggedin'];
//to get user details
$select = mysqli_query(
    $connection,
    "SELECT * FROM `users` WHERE `email` = '$loggedUser'"
);
$user = mysqli_fetch_array($select);
?>