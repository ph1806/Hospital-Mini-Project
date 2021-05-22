<?php
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
    $type=$_POST['Type'];
	$username=$_POST['username'];
	$password=($_POST['password']);
    
 if($type=='Admin')
 {
$ret=mysqli_query($con,"SELECT * FROM admin WHERE email='$username' and password='$password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
    session_start();
    $_SESSION['type']=$_POST['type'];
$extra="change-password.php";
$_SESSION['email']=$_POST['username'];
    $id=$num['User_ID'];
$_SESSION['id']=$id ;
   
echo '<script type="text/javascript">
window.location=\'viewDoctor.php\';</script>';
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'index.php\';</script>';
    
exit();
}
}
    
if($type=='Staff')
  {
     $_SESSION['type']=$_POST['type'];
    $ret1=mysqli_query($con,"SELECT * FROM staff WHERE email='$username' and password='$password'");
$num1=mysqli_fetch_array($ret1);
if($num1>0)
{
    session_start();

$_SESSION['email']=$_POST['username'];
    $id=$num1['S_id'];
$_SESSION['id']=$id ;
   
echo '<script type="text/javascript">
window.location=\'addPatient.php\';</script>';
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'index.php\';</script>';
    
exit();
}  
  }
    
 if($type=='Doctor')
  {
    $ret1=mysqli_query($con,"SELECT * FROM doctor WHERE email='$username' and password='$password'");
$num1=mysqli_fetch_array($ret1);
if($num1>0)
{
    session_start();
 $_SESSION['type']=$_POST['type'];
$_SESSION['email']=$_POST['username'];
    $id=$num1['S_id'];
$_SESSION['id']=$id ;
   
echo '<script type="text/javascript">
window.location=\'viewPatient.php\';</script>';
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'index.php\';</script>';
    
exit();
}  
  }   
    
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="index.html">
			  		Login Portal
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						

						
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form class="form-vertical" method="post">
						<div class="module-head">
							<h3>Sign In</h3>
						</div>
						<span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" id="inputEmail" name="username" placeholder="Username">
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
						<input class="span12" type="password" id="inputPassword" name="password" placeholder="Password">
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								 <select name="Type" id="Type">
               <option value="Admin">Admin</option>
               <option value="Doctor">Doctor</option>
               <option value="Staff">Staff</option>
             </select>
                                <div class="controls clearfix">
									<button type="submit" class="btn btn-primary pull-right" name="submit">Login</button>
                                   
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; Developed By PH </b> .
		</div>
	</div>
	