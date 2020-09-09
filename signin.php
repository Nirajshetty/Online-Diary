<?php
session_start();
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>login</title>
    <link rel="stylesheet" href="css/ss.css">
</head>

<body>
    <form action="" method="POST">
        <div class="login-box">
            <h1>Login</h1>
            <div class="textbox">
                <i class="fas fa-user "></i>
                <input type="email" name="email" class="txt" placeholder="Email-id">
            </div>

            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" name="pwd" class="txt" placeholder="Password">
            </div>

            <input type="submit" name="submit" class="btn" value="Login">
            <br>
            <p>Don't have an account? <a href="signup.php">Register here</a></p>
        </div>
    </form>
</body>
<?php
if(isset($_POST['submit']))
{
    $user = $_POST['email'];
    $pswd = $_POST['pwd'];
    $salted="456y45rghgfretghgdghfh".$pswd."hyytytdythjfyr7576t";
$hashed=hash('sha512',$salted);
    $query= "SELECT * FROM INFO WHERE email='$user' && pwd='$hashed'";
    $data=mysqli_query($success,$query);
    $total=mysqli_num_rows($data);
    if($total==1)
    {
        $_SESSION['user_name']=$user;
        header('location:index.php');
    }
    else{
        echo '<script>alert("Invalid email-id or password")</script>';
    }
}
?>