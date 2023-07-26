<?php 
include_once("db/session.php"); 
$response=['error'=>true];
if (isset($_POST['id']) &&isset($_POST['role'])) {
	$id=$_POST['id'];
	$role=$_POST['role'];
	$get_count=mysqli_query($conn,"SELECT COUNT(*) as count FROM individual WHERE manage_by='$id' AND manage_role='$role'");

	
	if($role=='1'){
		$get_emp=mysqli_query($conn,"SELECT COUNT(*) as empcount FROM employee WHERE supervisor_id='$id'");
		$result_emp_count=mysqli_fetch_array($get_emp);
		$response['empcount']=$result_emp_count['empcount'];
	};

	$result=mysqli_fetch_array($get_count);
	$response['error']=false;
	$response['count']=$result['count'];
	header('content-Type:application/json');
	echo json_encode($response);
}else{
	header('content-Type:application/json');
	echo json_encode($response);
}

?>