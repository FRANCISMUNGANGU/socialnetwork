<?php
require_once( $_SERVER['DOCUMENT_ROOT']."/socialnetwork/config/core.php");
$post = mysqli_real_escape_string($connection,$_POST['post']);

// validating post is not empty
if(empty($post))
{
    header("location:/socialnetwork/profile.php?msg=Please insert a post");

    die();
}
$userid = $user['id'];
$created = date('d-M-Y H:i:s');
$insert = mysqli_query(

    $connection,
    "INSERT INTO `posts`(`post`, `parent`, `created`)
                  VALUES('$post','$userid','$created')"
);
if($insert)
{
    header("location:/socialnetwork/profile.php?msg=");
    die();
}

?>