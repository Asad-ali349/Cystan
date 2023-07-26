<?php
include_once("db/session.php"); 
$response=['error'=>true];

if (isset($_POST['title'])&&isset($_POST['business'])&&isset($_POST['id'])&&isset($_POST['address'])&&isset($_POST['phone'])) {
	

	$title=$_POST['title'];
	$business=$_POST['business'];
	$id= $_POST['id'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];



	$update_vendor=mysqli_query($conn,"UPDATE vendors SET title='$title',business_type='$business',address='$address',phone='$phone' WHERE id='$id'");
	if ($update_vendor==true) {
		$response['error']=false;
		$response['msg']="Update Successfully";
		header('content-Type:application/json');
		echo json_encode($response);
	}else{
		$response['msg']=$conn->error;
		header('content-Type:application/json');
		echo json_encode($response);
	}
}else{
	$response['msg']="params Not Found";
		header('content-Type:application/json');
		echo json_encode($response);
}

?>