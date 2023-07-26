<?php 
include_once("db/session.php"); 
$user_id=$_SESSION['login_user'];
 $response=['error'=>false];


$nonapproved_sup = "SELECT Count(*) as count FROM service_requests JOIN individual ON individual.id=service_requests.individual_id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id Where service_requests.status='0' AND individual.manage_role='1' AND individual.manage_by='$user_id' AND service_requests.is_deleted='0'  ";
$result_nonapproved_sup=mysqli_query($conn,$nonapproved_sup);

$nonapproved_emp="SELECT COUNT(*) as count FROM supervisor INNER JOIN employee ON employee.supervisor_id=supervisor.id INNER JOIN individual ON individual.manage_by=employee.id INNER JOIN service_requests ON service_requests.individual_id=individual.id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id where individual.manage_role='2' AND employee.supervisor_id='$user_id' AND service_requests.status='0' AND service_requests.is_deleted='0';";
$result_nonapproved_emp=mysqli_query($conn,$nonapproved_emp);

$payment_sup = "SELECT Count(*) as count FROM service_requests JOIN individual ON individual.id=service_requests.individual_id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id Where service_requests.status='1' AND individual.manage_role='1' AND individual.manage_by='$user_id' AND service_requests.is_deleted='0' ";
$result_payment_sup=mysqli_query($conn,$payment_sup);

$payment_emp = " SELECT COUNT(*) as count FROM supervisor INNER JOIN employee ON employee.supervisor_id=supervisor.id INNER JOIN individual ON individual.manage_by=employee.id INNER JOIN service_requests ON service_requests.individual_id=individual.id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id where individual.manage_role='2' AND employee.supervisor_id='$user_id' AND service_requests.status='1' AND service_requests.is_deleted='0';";
$result_payment_emp=mysqli_query($conn,$payment_emp);

$progress_sup = "SELECT Count(*) as count FROM service_requests JOIN individual ON individual.id=service_requests.individual_id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id Where service_requests.status='2' AND individual.manage_role='1' AND individual.manage_by='$user_id' AND service_requests.is_deleted='0' ";
$result_progress_sup=mysqli_query($conn,$progress_sup);

$progress_emp = " SELECT COUNT(*) as count FROM supervisor INNER JOIN employee ON employee.supervisor_id=supervisor.id INNER JOIN individual ON individual.manage_by=employee.id INNER JOIN service_requests ON service_requests.individual_id=individual.id INNER JOIN services ON service_requests.service_id=services.id INNER JOIN grouping ON services.service_type=grouping.id where individual.manage_role='2' AND employee.supervisor_id='$user_id' AND service_requests.status='2' AND service_requests.is_deleted='0';";
$result_progress_emp=mysqli_query($conn,$progress_emp);

	$count=0;
if (mysqli_num_rows($result_nonapproved_sup)>0 && mysqli_num_rows($result_payment_sup)>0 && mysqli_num_rows($result_progress_sup)>0) {

	$sum=0;
	$data=$result_nonapproved_sup->fetch_array();
	$sum+=(int)$data['count'];
	$data=$result_nonapproved_emp->fetch_array();
	$sum+=(int)$data['count'];
	$response['count'][$count]=$sum;
	$response['status'][$count]="Non Approved";
	$count++;	
	
	$sum=0;
	$data=$result_payment_sup->fetch_array();
	$sum+=(int)$data['count'];
	$data=$result_payment_emp->fetch_array();
	$sum+=(int)$data['count'];

	$response['count'][$count]=$sum;
	$response['status'][$count]="Due Payment";
	$count++;

	$sum=0;
	$data=$result_progress_sup->fetch_array();
	$sum+=(int)$data['count'];
	$data=$result_progress_emp->fetch_array();
	$sum+=(int)$data['count'];


	$response['count'][$count]=$sum;
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