<?php
session_start();
error_reporting(0);
include("connect.php");
$userprofile=$_SESSION['user_name'];
if($userprofile){
  $query= "SELECT * FROM INFO WHERE email='$userprofile'";
$data=mysqli_query($success,$query);
$result=mysqli_fetch_assoc($data); //this is to fetch all the data of that particular user
$nam=$result['uname'];
$img=$result['img']; //returns image path
}
else
{
  header('location:signin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Diary</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4  site-navbar-target" role="banner">
      
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class=" xx site-logo mr-auto w-25" style="font-size:50px; margin-left:0px; color:white; font-family:Muli;">Online Diary</div>

          <form action="logout.php" method="POST" enctype="multipart/form-data">
        <div class="login-box">
            <input type="submit" style="border: 1px solid #3a3939;  border-radius: 40px 40px; " name="logout" class="btn" value="Logout">
        </div>
    </form>
        </div>
      </div>
      
    </header>

    <div class="intro-section" id="home-section">
      
      <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <?php
                   echo '<img src="data:image;base64,'.base64_encode($img).'" alt="image" style="width:200px; height:250px;">';
                  ?>
                  <br>
                  <br>
                  
                  <h2  data-aos="fade-up" data-aos-delay="100"> <?php echo "Welcome  ".$nam." !"; ?></h2>
                  <h1 >Write and Access your diary anywhere and anytime.</h1>
                  <p style="margin-top:5px;">Now write your Personal Diary online!!</p>
                  <br><br>
                  <form action="view.php" method="POST" enctype="multipart/form-data">
       
    </form>
    <form action="view.php" method="POST" enctype="multipart/form-data">
    <div>
            <input type="submit" name="view" style="border: 1px solid #3a3939;  border-radius: 40px 40px; margin-top:-80px;" class="btn" value="View Your Diary">
        </div>
</form>
                </div>
                
                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500" style="margin-left: 10px;">
                <br>
                <br>
                
                  <form action="" method="post" class="form-box" style="margin-left:initial; margin-top: 85px;" enctype="multipart/form-data">
                    <h3 class="h4 text-black mb-4">Update Diary</h3>
                    <p style="color: black;" >Today's date</p>
                    <div class="form-group">
                      <input type="date" class="form-control" name="dat" placeholder="Date" required>
                    </div>
                    <p style="color: black;">Today's feed</p>
                    <div class="form-group">
                      
                      <textarea cols="50" rows="5" class="form-control" style="height: 250px;"name="msg" placeholder="Write something" required>
                      </textarea>
<br>
                    </div>
                   <p style="color: black;">Upload Image</p>
                      
                   
                    <div class="form-group">
                      <input type="file" class="form-control" name="pics" required>
                    </div>
                    <div class="form-group">
                     <input type="submit" name="insert"  class="btn btn-primary btn-pill" value="Save">
                    </div>
                  </form>

                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    
    
    
     


  
    
  </div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>

  
  <script src="js/main.js"></script>
    
  </body>
</html>

<?php

if(isset($_POST['insert']))
{
$n=$_POST['dat'];
$e=$_POST['msg'];
$userprofile=$_SESSION['user_name'];
$file=addslashes(file_get_contents($_FILES["pics"]["tmp_name"]));
$query="INSERT INTO content (email,dat,msg,picture) VALUES ('$userprofile','$n','$e','$file')";
if(mysqli_query($success,$query))
{
    header('location:index.php');
}
}

?>