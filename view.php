<?php
session_start();
include("connect.php");
if(isset($_POST['view']))
{
$userprofile=$_SESSION['user_name'];
$query="SELECT content.msg, content.dat, content.picture FROM content  WHERE email='$userprofile'";
$data=mysqli_query($success,$query);
$result=$success->query($query) or die($success->error) ;//this is to fetch all the data of that particular user

}
else{
    echo '<script>alert("Error Occurred")</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>View</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/v.css">
    <div class="site-logo mr-auto w-25" style=" text-align:center; margin-left:504px; color:black; font-size: 40px;"><strong>My Personal Diary</strong></div><br><br>
  </head>
  <body>
    
  <?php
  while($row=$result->fetch_assoc()){
    echo'<h3 class="des"> ';
    echo'<h3 class="fonts">';
    echo $row['dat'];
     echo '</h3>';
     
   
    echo '<img src="data:image;base64,'.base64_encode($row['picture']).'" alt="image" style="width:200px; height:250px;">'.'<p>'.$row['msg'].'</p>';
  
 

 
  echo '</h3><br>';


  }
  
  ?>
  
  </form>
    <form action="index.php" method="POST" enctype="multipart/form-data">
    <div>
           <input type="submit" name="view"  class="btn" value="Back">
        </div>
        <br>
        <br>
</form>
  </form>
  </body>
  </html>