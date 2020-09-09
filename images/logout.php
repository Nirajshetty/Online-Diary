<?php
session_start();
if(isset($_POST['logout']))
{
    echo 'logged out';
header('location:signin.php');
session_unset();
}
?>