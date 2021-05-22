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
    <title>Admin</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <style type="text/css">
        
    #chart-container {
                    width: 100%;
                    height: auto;
                }
    </style>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php 
     $type=$_SESSION['email'];
     if($type=='Staff')
     {
         
     include('include/patientSidebar.php');
     }
     else
     {
         include('include/sidebarDoctor.php');
     }
     
                ?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Patient Graph</h3>
							</div>
							<div class="module-body">

        <div id="chart-container">
            <canvas id="graphCanvas1"></canvas>
        </div>
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
        $(document).ready(function () {
            
            lineChart();
            
        });
       
        function lineChart()
        {
            {
                $.post("data1.php",
                function (data)
                {
                    console.log(data);
                     var date = [];
                    var count = [];

                    for (var i in data) {
                        date.push(data[i].A_Date);
                        count.push(data[i].count);
                    }

                    var chartdata = {
                        labels: date,
                        datasets: [
                            {
                                label: 'Patient Graph',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: count,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas1");
                    
                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata
                    });
                });
            }
        }
        
    </script>
    </body>
<?php  }?>