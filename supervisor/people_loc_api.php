<?php
include_once("db/session.php"); 

if(!isset($_SESSION['login_user'])|| $_SESSION['login_user']==''){         
        echo "<script>window.location.href='index.php';</script>";
    }
$user_id=$_SESSION['login_user'];

$response=['error'=>false];


if (isset($_POST['id'])) {
	

	$people=mysqli_query($conn,"SELECT employee.name AS emp_name,individual.*,grouping.name AS group_name,grouping.pin_color_id FROM supervisor LEFT JOIN employee ON employee.supervisor_id=supervisor.id LEFT JOIN individual ON individual.manage_by=employee.id LEFT JOIN grouping ON grouping.id=individual.group_id WHERE individual.manage_role='2' AND supervisor.id='$user_id'  AND individual.status='1'");

	$superpeople=mysqli_query($conn,"SELECT individual.*,grouping.name AS group_name,grouping.pin_color_id FROM individual LEFT JOIN grouping ON grouping.id=individual.group_id WHERE individual.manage_role='1' AND individual.manage_by='$user_id' AND individual.status='1'" );

	if (mysqli_num_rows($people)>0 || mysqli_num_rows($superpeople)>0) {
		$count=0;
		while ($data=$people->fetch_array()) {
			$loc=[];
			$loc['id']=$data['id'];
			$loc['name']=$data['name'];
			$loc['pin_color_id']=$data['pin_color_id'];
			$loc['group_id']=$data['group_id'];
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
		while ($data=$superpeople->fetch_array()) {
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

		// var_dump($response);
		header('content-Type:application/json');
		echo json_encode($response);
	}
}

?>