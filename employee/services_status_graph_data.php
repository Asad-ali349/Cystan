
<?php 
include_once("db/session.php"); 
$user_id=$_SESSION['login_user'];
 $response=['error'=>false];


$nonapproved = "SELECT COUNT(*) as count FROM service_requests JOIN individual ON individual.id=service_requests.individual_id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id Where service_requests.status='0' AND individual.manage_role='2' AND individual.manage_by='$user_id' AND service_requests.is_deleted='0' ORDER BY service_requests.id DESC";
$result_nonapproved=mysqli_query($conn,$nonapproved);

$payment = "SELECT COUNT(*) as count FROM service_requests JOIN individual ON individual.id=service_requests.individual_id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id Where service_requests.status='1' AND individual.manage_role='2' AND individual.manage_by='$user_id' AND service_requests.is_deleted='0' ORDER BY service_requests.id DESC";
$result_payment=mysqli_query($conn,$payment);

$progress = "SELECT COUNT(*) as count FROM service_requests JOIN individual ON individual.id=service_requests.individual_id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id Where service_requests.status='2' AND individual.manage_role='2' AND individual.manage_by='$user_id' AND service_requests.is_deleted='0' ORDER BY service_requests.id DESC";
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