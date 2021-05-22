<?php
header('Content-Type: application/json');
$conn = mysqli_connect("localhost","root","","task");
$sqlQuery = "SELECT count(*) as count,A_Date FROM patientf group by A_Date";
$result = mysqli_query($conn,$sqlQuery);
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}
mysqli_close($conn);
echo json_encode($data);
?>