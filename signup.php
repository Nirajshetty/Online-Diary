<?php
session_start();
include("connect.php");
if(isset($_POST['sub']))
{
  $error= false;
  $e=$_POST['uemail'];
$query= "SELECT email FROM info WHERE email='$e'";
$res=mysqli_query($success,$query);
  if(mysqli_num_rows($res) != 0)
  {
    $error=true;
     echo '<script>alert("This email Id is already registerd")</script>';
  }
else{
$n=$_POST['uname'];
$e=$_POST['uemail'];
$p=$_POST['pswd'];
$salted="456y45rghgfretghgdghfh".$p."hyytytdythjfyr7576t";
$hashed=hash('sha512',$salted);
$file=addslashes(file_get_contents($_FILES["imag"]["tmp_name"]));
move_uploaded_file();
$q="INSERT INTO info (uname,email,pwd,img) VALUES ('$n','$e','$hashed','$file')";
if(mysqli_query($success,$q))
{
    echo '<script>alert("Image inserted into database")</script>';
    header('location:signin.php');
}
}
}
 /*
    $sql = "INSERT INTO info (uname,email,pwd,img) VALUES ('$n','$e','$p','$i')";
if (mysqli_query($success, $sql)) {
    echo'  <script>alert("Registered Successfully")</script>';
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($success);
}

}*/

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="ss.css">
  </head>
  <body>
      <form action="" method="POST" enctype="multipart/form-data">
<div class="login-box">
  <div class="textbox">
    <i class="fas fa-user "></i>
    <input type="text" class="txt" name="uname" placeholder="Name" required>
  </div>
  <div class="textbox">
    <i class="fas fa-file-image"></i>
    <p class="txt" style="margin-left: 35px; margin-top: 1px; color:rgb(195, 195, 195); font-size: 18px">Upload Photo</p>
    <input type="file"  class="txt" name="imag" style="color:rgb(195, 195, 195);" id="image" placeholder="Upload your Photo" >
  </div>
  <div class="textbox">
    <i class="fas fa-envelope "></i>
    <input type="email" class="txt" name="uemail" placeholder="Email-id" required>
  </div>
  <div class="textbox">
    <i class="fas fa-lock "></i>
    <input type="password" class="txt" name="pswd" placeholder="Create Password" required>
  </div>


  <input type="submit" id="insert" class="btn" name="sub" value="Register">
  <br>
</div>
</form>
  </body>
</html>
<script>
$(document).ready(function(){
  $('#insert').click(function(){
    var image_name=$('#image').val();
    if(image_name=='')
    {
      alert("Please Select Image");
      return false;
    }
    else{
      var extension=$('#image').val().split('.').pop().toLowerCase();
      if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])==-1)
      {
        alert('Invalid Image file');
        $('#image').val('');
        return false;
      }
    }
  });
});
</script>