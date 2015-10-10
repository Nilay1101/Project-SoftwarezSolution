<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: index.php'); } 

//define page title
$title = 'Members Page';

//include header template
require('layout/header.php'); 
?>


<?php
 $conn=mysql_connect('naipathya.in.mysql','naipathya_in','vJErF3ra');//
mysql_select_db('naipathya_in');
if(isset($_POST['submit'])){ 
$email =$_SESSION['email'];
$message = $_POST['message'];
if($message!=''){
$query = mysql_query("insert into member_message( email,message) values ( '$email',  '$message')");

    echo"<script>alert('Your response has been recorded. we will get back to you soon')</script>";
    
    //send email
			$to = $email;
			$subject = "Thank You";
			$body = " hi $name Thank you for  contacting softwarez.\n\n we will contact You Soon: \n\nif you need any urgent information you can call +918449770871 we will happy to help you
			\n\n please don't reply to this mail this auto generated mail ";
			$additionalheaders = "From: <".Softwarez.">\r\n";
			$additionalheaders .= "Reply-To: ".Softwarez."";
			mail($to, $subject, $body, $additionalheaders);
			$to1="support.app@naipathya.in";
			$subject1="msg from member";
			$body1="\n\n Customer mail:$email\n   Customer message:$message";
				mail($to1, $subject1, $body1, $additionalheaders);

    
}


elseif($message=''){
    echo"<script>alert('Please try again')</script>";
} 


}
	mysql_close($conn);
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>| Document |</title>
    <link href=" css/bootstrap.css" rel="stylesheet" />
    <link href=" css/font-awesome.css" rel="stylesheet" />
    <link href=" js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href=" css/custom-styles.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<h4>&nbsp;&nbsp;&nbsp;Hi! <?php echo $_SESSION['email']; ?></h4>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i>Notification
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i>Notification
                                    <span class="pull-right text-muted small">34 min</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-home fa-fw"></i> Softwarez Solutions : Home</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Support</a>
                        </li>
						<li><a href="#"><i class="fa fa-pencil fa-fw"></i> Blogs</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="index-2.html"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="form.html"><i class="fa fa-edit"></i>Fill-in-Form </a>
                    </li>
					<li>
                        <a href="newchat/start.html"><i class="fa fa-user"></i>Chat with us</a>
                    </li>
					<li>
                        <a href="https://www.payumoney.com/paybypayumoney/#/50793"><i class="fa fa-money"></i>Pay with Pay U Money</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="page-header">
                            Welcome to Softwarez Solutions
                        </h1>
                    </div>
                </div>
				
				<div class="row">
				<div class="col-lg-12">
                                    <form action="" method="">
										<div class="form-group">
                                            <label>Leave your message here :</label>
                                            <textarea class="form-control" rows="3" name="message"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </form>
                                </div>
								</div>
            </div>
        </div>
    </div>
	
	<script src=" js/jquery-1.10.2.js"></script>
    <script src=" js/bootstrap.min.js"></script>
    <script src=" js/jquery.metisMenu.js"></script>
    <script src=" js/custom-scripts.js"></script>
	

</body>
</html>