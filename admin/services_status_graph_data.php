
<?php 
include_once("db/session.php"); 

 $response=['error'=>false];


$nonapproved = "SELECT COUNT(*) as count FROM `service_requests` where status=0 AND is_deleted='0'";
$result_nonapproved=mysqli_query($conn,$nonapproved);

$payment = "SELECT COUNT(*) as count FROM `service_requests` where status=1 AND is_deleted='0'";
$result_payment=mysqli_query($conn,$payment);

$progress = "SELECT COUNT(*) as count FROM `service_requests` where status=2 AND is_deleted='0'";
$result_progress=mysqli_query($conn,$progress);

	$count=0;
if (mysqli_num_rows($result_nonapproved)>0 && mysqli_num_rows($result_payment)>0 && mysqli_num_rows($result_progress)>0) {
	
	$data=$result_nonapproved->fetch_array();
	$response['count'][$count]=$data['count'];
	$response['status'][$count]="Non Approved";
	$count++;	
	

	$data=$result_payment->fetch_array();
	$response['count'][$count]=$data['count'];
	$response['status'][$count]="Due Payment";
	$count++;

	$data=$result_progress->fetch_array();
	$response['count'][$count]=$data['count'];
	$response['status'][$count]="In Progress";
	$count++;


	


	header('content-Type:application/json');
	echo json_encode($response);
}else{
	$response['error']=true;
	header('content-Type:application/json');
	echo json_encode($response);
}
	
				



?>