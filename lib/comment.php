<?php
require_once( $_SERVER['DOCUMENT_ROOT']."/socialnetwork/config/core.php");
$comment = mysqli_real_escape_string($connection,$_POST['comment']);
$postid = mysqli_real_escape_string($connection,$_POST['postid']);

// validating post is not empty
if(empty($comment))
{
    header("location:/socialnetwork/profile.php?msg=Please insert a comment");
    die();
}
$userid = $user['id'];

$created = date('d-M-Y H:i:s');
$insert = mysqli_query(

    $connection,
    "INSERT INTO `comments`(`comment`, `post`, `user`,`created`)
                  VALUES('$comment','$postid','$userid','$created')"
);
if($insert)
{
  
    header("location:/socialnetwork/profile.php?msg=Comment made successfully");
    die();
}
?>