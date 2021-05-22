
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['email'])==0)
	{	
header('location:index.php');
}
else{
	
if(isset($_POST['submit']))
{
    $query1=mysqli_query($con,"Select User_ID from admin where email='".$_SESSION['email']."'");
     $row1=mysqli_fetch_array($query1);
    $ID=$row1['User_ID'];
    
$name=$_POST['Name'];
$email=$_POST['Email'];
$number=$_POST['number'];
$password=$_POST['password'];

	$query1="insert into Admin(User_ID,User_Name,Email,Password,Mobile) values('','$name','$email','$password','$number')";
$sql=mysqli_query($con,$query1);
    if($sql)
    {
$_SESSION['msg']="Product Inserted Successfully !!";
    }
    else
    {
        $_SESSION['msg']=mysqli_error($con) ;
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

   <script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat.php",
	data:'cat_id='+val,
	success: function(data){
		$("#subcategory").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>	


</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Add Admin</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

			<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

<div class="control-group">
<label class="control-label" for="basicinput"> Name</label>
<div class="controls">
<input type="text"    name="Name"  placeholder="Enter Doctor Name" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput"> Email</label>
<div class="controls">
<input type="text"    name="Email"  placeholder="Enter  Email" class="span8 tip" id="email" onBlur="userAvailability()" required>
      <span id="user-availability-status1" style="font-size:12px;"></span>
</div>
</div>                

<div class="control-group">
<label class="control-label" for="basicinput"> Number</label>
<div class="controls">
<input type="text"  max="10"  name="number"  placeholder="Enter  Mobile Number" class="span8 tip" required>
    
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput"> Password</label>
<div class="controls">
<input type="text"    name="password"  placeholder="Enter  Password" class="span8 tip" required>
</div>
</div>
	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Add</button>
											</div>
										</div>
									</form>
							</div>
						</div>


	
						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
    <script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

</body>
<?php } ?>