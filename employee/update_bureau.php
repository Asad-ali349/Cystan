<?php
include_once("db/session.php"); 
$response=['error'=>true];

if (isset($_POST['title'])&&isset($_POST['pobox'])&&isset($_POST['id'])&&isset($_POST['address'])&&isset($_POST['website'])&&isset($_POST['phone'])) {
	

	$title=$_POST['title'];
	$pobox=$_POST['pobox'];
	$id= $_POST['id'];
	$address=$_POST['address'];
	$website=$_POST['website'];
	$phone=$_POST['phone'];


	$update_bureau=mysqli_query($conn,"UPDATE bureau SET title='$title',po_box='$pobox',address='$address',website='$website',phone='$phone' WHERE id='$id'");
	if ($update_bureau==true) {
		$response['error']=false;
		$response['msg']="Update Successfully";
		header('content-Type:application/json');
		echo json_encode($response);
	}else{
		$response['msg']="Unable to Update";
		header('content-Type:application/json');
		echo json_encode($response);
	}
}

?>