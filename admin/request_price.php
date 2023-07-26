<?php 
include 'db/session.php';
 $response=['error'=>true];
if (isset($_POST['price']) && isset($_POST['id'])) {
	$price=$_POST['price'];
	$id=$_POST['id'];

	$add_price=mysqli_query($conn,"UPDATE service_requests SET price='$price' ,status='1' WHERE id='$id'");
	if ($add_price) {
		$response['error']=false;
		$response['msg']="Amount Sent";
		header('content-Type:application/json');
		echo json_encode($response);	
	}else{
		$response['msg']="Unable to send Amount ";
		header('content-Type:application/json');
		echo json_encode($response);
	}
}

 ?>