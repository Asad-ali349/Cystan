<?php 
include_once '../../../../db/conn.php';
$response=['error'=>true];
if(isset($_POST['lid'])){
	$lid=$_POST['lid'];
	$get_sign=mysqli_query($conn,"SELECT * from letter where id='$lid'");
	if (mysqli_num_rows($get_sign)>0) {
		$result=mysqli_fetch_array($get_sign);
		$response['error']=false;
		$response['sign']=$result['signature'];
		header("content-type: application/json");
		echo json_encode($response);
	}else{
		header("content-type: application/json");
		echo json_encode($response);
	}
}else{
	
		header("content-type: application/json");
		echo json_encode($response);
}



 ?>