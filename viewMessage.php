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
	<title>Admin| Insert Product</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>


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
								<h3>Message Detalis</h3>
							</div>
							<div class="module-body">

								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
                                            
											<th>Message ID</th>
											<th>Sender Name </th>
											<th>Message</th>
											
											
										</tr>
									</thead>
									<tbody>

<?php 
      $query1=mysqli_query($con,"select ID from user where email='".$_SESSION['email']."'");
    $row1=mysqli_fetch_array($query1);
    $ID=$row1['ID'];
     
     
     
     $query=mysqli_query($con,"select * from message where ID='$ID'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
    
    
?>									
										<tr>
											<td><?php 
    
    
    echo htmlentities($cnt);?></td>
											
											<td><?php echo htmlentities($row['M_ID']);?></td>
											<td>
                <?php
    $id3=$row['sent_ID'];

    $query3=mysqli_query($con,"select name from user where ID='$id3'");
    $row3=mysqli_fetch_array($query3);
    if(!$query3)
    {
        echo mysqli_error($con);
    }
    else
    {
    
    echo htmlentities($row3['name']);
    }
                                                ?>
                                            </td>
											<td> <?php echo htmlentities($row['text']);?></td>
                                         
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
<?php }?>