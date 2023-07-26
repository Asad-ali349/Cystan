
<?php 
include_once("db/session.php"); 

 $response=['error'=>false];
if (isset($_POST['id'])){


$id=$_POST['id'];


$sql = "SELECT * FROM naics WHERE id='$id'";
$result=mysqli_query($conn,$sql);

	$count=0;
if (mysqli_num_rows($result)>0) {
	$data=$result->fetch_array();

	$response['sic_code']=$data['sic_code'];
	$response['naics_code']=$data['naics_code'];
	$response['description']=$data['description'];
	$response['ins']=$data['ins'];


	header('content-Type:application/json');
	echo json_encode($response);
}else{
	$response['error']=true;
	header('content-Type:application/json');
	echo json_encode($response);
}
	
}

?>