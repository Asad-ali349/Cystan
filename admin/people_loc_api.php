<?php
include_once("db/session.php"); 


$user_id=$_SESSION['login_user'];

$response=['error'=>false];


if (isset($_POST['id'])) {
	
	
		$sql=mysqli_query($conn,"SELECT individual.id,individual.name,individual.group_id,individual.phone,individual.email,individual.street,individual.city,individual.state,individual.zip,individual.country,individual.credit_score,individual.lattitude,individual.longitude,grouping.name AS group_name,grouping.pin_color_id as 'pin_color_id' FROM individual LEFT JOIN grouping ON grouping.id=individual.group_id Where individual.status=1 ");
		if (mysqli_num_rows($sql)>0) {
			$count=0;
			while ($data=$sql->fetch_array()) {
				$loc=[];
				$loc['id']=$data['id'];
				$loc['name']=$data['name'];
				$loc['group_id']=$data['group_id'];
				$loc['pin_color_id']=$data['pin_color_id'];
				$loc['contact']=$data['phone'];
				$loc['email']=$data['email'];
				$loc['street']=$data['street'];
				$loc['state']=$data['state'];
				$loc['zip']=$data['zip'];
				$loc['country']=$data['country'];
				$loc['credit_score']=$data['credit_score'];
				$loc['latitude']=$data['lattitude'];
				$loc['longitude']=$data['longitude'];


				$loc['group_name']=$data['group_name'];
				$response['loc'][$count]=$loc;
				$count++;	
			}


			header('content-Type:application/json');
			echo json_encode($response);
		}
}

?>