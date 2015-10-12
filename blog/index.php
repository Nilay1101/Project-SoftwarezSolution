<?php require'includes/connect.php' ?>

<?php require'includes/admin.php' ?>

<?php

session_start();

if(isset($_SESSION['email'])){

header("location:welcome.php");

}

else{

?>	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
	<title>| Author Softwarez Solution |</title>

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="css/library/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/library/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/library/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/md-font.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
 
</head>
<body id="page-top" class="home">

<div id="page-wrap">

 
    <section id="login-content" class="login-content">
        <div class="awe-parallax bg-login-content"></div>
        <div class="awe-overlay"></div>
        <div class="container">
            <div class="row">           
                <div class="col-lg-12 pull-center">
                    <div class="form-login">
                        <form method=POST> 
                            <h2 class="text-uppercase">sign in</h2>
                            <div class="form-email">
                                <input type="text" placeholder="Email" name="lg_username" required>
                            </div>
                            <div class="form-password">
                                <input type="password" placeholder="Password" name="lg_password" required>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="check">
                                <label for="check">
                                <i class="icon md-check-2"></i>
                                Remember me</label>
                                <a href="#">Forget password?</a>
                            </div>
                            <div class="form-submit-1">
                                <input type="submit" value="Sign In" class="mc-btn btn-style-1" name="user_login">
                            </div>
                            <div class="link">
                                <a href="register.php">
                                    <i class="icon md-arrow-right"></i>Don’t have account yet ? Join Us
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
  
    
    <footer id="footer" class="footer">
        <div class="second-footer">
            <div class="container">
                <div class="contact">
                    <div class="email">
                        <i class="icon md-email"></i>
                        <a href="#">email</a>
                    </div>
                    <div class="phone">
                        <i class="fa fa-mobile"></i>
                        <span>mobile</span>
                    </div>
                    <div class="address">
                        <i class="fa fa-map-marker"></i>
                        <span>address</span>
                    </div>
                </div>
                <p class="copyright">&copy;Softwarez Solution</p>
            </div>
        </div>
    </footer>


    


</div>

<script type="text/javascript" src="js/library/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/library/bootstrap.min.js"></script>
<script type="text/javascript" src="js/library/jquery.owl.carousel.js"></script>
<script type="text/javascript" src="js/library/jquery.appear.min.js"></script>
<script type="text/javascript" src="js/library/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="js/library/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>

<?php

if(isset($_POST['user_login'])){

	

	$login=new admin;

	if($login->userlogin($_POST['lg_username'],$_POST['lg_password'])){

	    header("location:welcome.php");		

		exit;

			

			}

			else{

				echo"<script>alert('Error')</script>";

			}

}

?>

<?php } ?>