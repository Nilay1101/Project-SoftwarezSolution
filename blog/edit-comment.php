<?php require'includes/connect.php' ?><?phpsession_start();if(!isset($_SESSION['email'])){		header("location:index.php");}else{ if(isset($_GET['edit'])){ 	$title=$_GET['edit'];	$query="SELECT * FROM `ss_post` where title='$title'";		$run =mysql_query($query);	$row=mysql_fetch_array($run);?><!DOCTYPE html><html lang="en"><head>	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	<meta name="viewport" content="width=device-width, initial-scale=1.0">	<title>| Document |</title>	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">	<link type="text/css" href="css/theme.css" rel="stylesheet">	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>	  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>  <script>          tinymce.init({              selector: "textarea",              plugins: [                  "advlist autolink lists link image charmap print preview anchor",                  "searchreplace visualblocks code fullscreen",                  "insertdatetime media table contextmenu paste"              ],              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"          });  </script></head><body>	<div class="navbar navbar-fixed-top">		<div class="navbar-inner">			<div class="container">				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">					<i class="icon-reorder shaded"></i>				</a>			  	<a class="brand" href="index.php">			  		Softwarez Solutions : Admin			  	</a>				<div class="nav-collapse collapse navbar-inverse-collapse">									<ul class="nav pull-right">					<li><a href="#">Logout</a></li>					</ul>				</div><!-- /.nav-collapse -->			</div>		</div><!-- /navbar-inner -->	</div><!-- /navbar -->	<div class="wrapper">		<div class="container">			<div class="row">								<div class="span12">					<div class="content">						<div class="module">							<div class="module-head">								<h3>Edit Comments</h3>							</div>							<div class="module-body">								<?php	//if comment has been approved process it		if(isset($_POST['Approve'])){		$cid=$_POST['cid'];		$comment=$_POST['comment'];		$email=$_POST['email'];		    $qry="UPDATE `ss_post_comments` SET comment = '$comment', status='active' WHERE cid = '$cid' ";	$var=mysql_query($qry);			if($var>0){			    $to = $email;                $subject = "Your comment Is Approved";                $txt = "Thanks \n\n                For posting your valuable Comment on our Blog\n                Please Visit wwww.softwarezsolution.com/blog.php \n                to find out more intresting Stories\n                \n\n                keep commenting!\n                Softwarez Solution\n                www.softwarezsolution.com                ";                                $headers = "From: blog@softwarezsolution.com" . "\r\n" .                "CC: blog@softwarezsolution.com";                mail($to,$subject,$txt,$headers); 			    			echo"<script>alert('Approved Successfully')</script>";				}			else{					echo"<script>alert('Failed to Approve Please Retry')</script>";							}	    			}	    if(isset($_POST['Discard'])){		$cid=$_POST['cid'];		$email=$_POST['email'];        $qry="DELETE FROM `ss_post_comments` WHERE cid = '$cid' ";	    $var=mysql_query($qry);			if($var>0){			     $to = $email;                $subject = "Your comment Is Discarded";                $txt = "Thanks \n\n                For posting your valuable Comment on our Blog\n                Please Visit wwww.softwarezsolution.com/blog.php \n                to find out more intresting Stories\n                \n\n                keep commenting!\n                Softwarez Solution\n                www.softwarezsolution.com                ";                                $headers = "From: blog@softwarezsolution.com" . "\r\n" .                "CC: blog@softwarezsolution.com";                mail($to,$subject,$txt,$headers); 			echo"<script>alert('Discarded Successfully')</script>";				}			else{					echo"<script>alert('Failed to Discard Please Retry')</script>";							}	    				    		}?>							<br />		<p><label><h2><?php echo $row['title'];?></h2></label><br />		<p><label><?php echo $row['sdesc'];?></label><br />		<p><label><?php echo $row['ldesc'];?></label><br />		<?php $pid=$row['pid'];?>		<h4>Edit UnApproved Comments</h4>    	        <?php		 	$query="SELECT * FROM `ss_post_comments` where pid='$pid' && status='not active' ORDER BY cid DESC LIMIT 15 ";				$run =mysql_query($query);			while($row=mysql_fetch_array($run)){			$cid=$row['cid'];			$email=$row['email'];			$comment=$row['comment'];		?>    	            	    <form method=POST>    	        <input type="hidden" name="cid" value="<?php echo $cid;?>">    	        <input type="hidden" name="email" value="<?php echo $email;?>">	        	<p><label>By:<?php echo $email;?></label><br />                <p><label>comment</label><br />		        <input type='text' name='comment'value='<?php echo $comment;?>'  class="span8"></p>		        <p><input type='submit' name='Approve' value='Approve' class='btn-warning'>		        <input type='submit' name='Discard' value='Discard' class='btn-warning'></p>            </form>             <?php    }  ?>          							</div>						</div>																	</div><!--/.content-->				</div><!--/.span9-->			</div>		</div><!--/.container-->	</div><!--/.wrapper-->	<div class="footer">		<div class="container">			 			<b class="copyright">&copy; Admin - naipathya.in </b> All rights reserved.		</div>	</div>	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script></body></html><?php } else{		header("location:index.php");}}?>		