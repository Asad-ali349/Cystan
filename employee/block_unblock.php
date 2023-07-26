<?php
include_once("db/session.php"); 
$iD=$_GET['id'];
$table=$_GET['table'];
$page=$_GET['page'];
$status=$_GET['status'];
$response=['error'=>true];
$query="UPDATE ".$table." SET status=".$status." WHERE id=".$iD;

$delete=mysqli_query($conn,$query);
if ($delete==true) {
	if ($status==1 && ($page=="view_supervisor.php" ||$page=="view_employee.php")) {
		$_SESSION['success']="Unblocked";
		$_SESSION['error']=false;	
		header("Location: ".$page);
	}else if($status==0 && ($page=="view_supervisor.php" ||$page=="view_employee.php")){
		$_SESSION['success']="Blocked";
		$_SESSION['error']=false;

		header('content-Type:application/json');
		echo json_encode($response);
	}else if($status==0 && $page=="view_company.php" ){
		$_SESSION['success']="Deleted";
		$_SESSION['error']=false;
		header("Location: ".$page);
	}else if($status==0 && $page=="view_people.php"){
		
		$del_comp=mysqli_query($conn,"UPDATE company SET status ='0' WHERE owned_by='$iD'");
		if ($del_comp==true) {
			$response['error']=false;
			header('content-Type:application/json');
			echo json_encode($response);
		}
		
	}else if($status==3 && $page=="inprogress_services_req.php" ){
		$_SESSION['success']="Completed";
		$_SESSION['error']=false;
		header("Location: ".$page);
		
	}else{
		
		header("Location: ".$page);
	}

	
}else{
	$_SESSION['error']="You cannot delete because this data is used somewhere";
	header("Location: ".$page);
}
?>