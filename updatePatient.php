
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['email'])==0)
	{	
header('location:index.php');
}
else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admi</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/patientSidebar.php');?>				
			<div class="span9">
					<div class="content">

	<div class="module">
							<div class="module-head">
								
<?php 
    $query1=mysqli_query($con,"select * from Patientf ");
    $row=mysqli_fetch_array($query1);
    
     $cnt=1;
while($row=mysqli_fetch_array($query1))
{
?>					
                                
<div class="control-group">
<label class="control-label" for="basicinput"> Name</label>
<div class="controls">
<input type="text"    name="Name"  placeholder="Enter Patient Name" class="span8 tip" required>
</div>
</div>

                                
                                
										
                    <?php 
    
    $PID=$row['P_id'];
    $query12=mysqli_query($con,"select S_ID from patientf where P_id='$PID' ");
    $row1=mysqli_fetch_array($query12);
    $S_ID=$row1['S_ID'];
    
    $query13=mysqli_query($con,"select B_ID from staff where S_id='$S_ID' ");
    $row2=mysqli_fetch_array($query13);
    $b_id=$row2['B_ID'];
    
    $query123=mysqli_query($con,"select B_Name from Branch where B_id='$b_id' ");
    $row14=mysqli_fetch_array($query123);
    $branch=$row14['B_Name'];
    
    
    
    ?>        <td>
                     <?php
    echo htmlentities($row14['B_Name']);
    ?>
    </td>                                
                                            
                                            
                                            
						</tr>											
											
										<?php $cnt=$cnt+1; } ?>
										
								</table>
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
</body>
<?php } ?>