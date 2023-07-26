<?php
include_once("db/session.php"); 
$response=['error'=>true];

if (isset($_POST['name'])&&isset($_POST['color'])&&isset($_POST['id'])) {
	$name=$_POST['name'];
	$color=$_POST['color'];
	$id= $_POST['id'];
	$update_group=mysqli_query($conn,"UPDATE grouping SET name='$name',pin_color_id='$color' WHERE id='$id'");
	if ($update_group==true) {
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