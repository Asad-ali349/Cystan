
<?php 
include_once("db/session.php"); 

 $response=['error'=>false];


$sql = "SELECT ROUND(SUM(amount)/100,2) as sum,month(created_at) as month,created_at FROM `transactions` GROUP BY month(created_at) HAVING YEAR(created_at)=YEAR(CURDATE());";
$result=mysqli_query($conn,$sql);

	$count=0;
if (mysqli_num_rows($result)>0) {
	
	while ($data=$result->fetch_array()) {
		$response['sum'][$count]=$data['sum'];
		$monthNum  = $data['month'];
		$dateObj   = DateTime::createFromFormat('!m', $monthNum);
		$monthName = $dateObj->format('F');
		$response['month'][$count]=$monthName;
		$count++;	
	}

	


	header('content-Type:application/json');
	echo json_encode($response);
}else{
	$response['error']=true;
	header('content-Type:application/json');
	echo json_encode($response);
}
	
				



?>