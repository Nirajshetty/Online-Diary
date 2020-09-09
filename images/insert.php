<?php
session_start();
include("connect.php");
if(isset($_POST['insert']))
{
$n=$_POST['dat'];
$e=$_POST['msg'];
$file=addslashes(file_get_contents($_FILES["pix"]["tmp_name"]));
$q="INSERT INTO content (dat,msg,picture) VALUES ('$n','$e','$file')";
if(mysqli_query($success,$q))
{
    echo '<script>alert("Image inserted into database")</script>';
    header('location:index.php');
}
}

?>