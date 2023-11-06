<?php
require_once( $_SERVER['DOCUMENT_ROOT']."/socialnetwork/config/core.php");
$id = mysqli_real_escape_string($connection,$_POST['id']);
$delete = mysqli_query(
    $connection,  
    "DELETE FROM `posts` WHERE `id` = '$id'"
);
if($delete){
 
    header("location:/socialnetwork/profile.php?msg=Post deleted successfully");
    die();
}
?>