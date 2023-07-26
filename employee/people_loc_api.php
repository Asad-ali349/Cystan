<?php
include_once("db/session.php"); 

if(!isset($_SESSION['login_user'])|| $_SESSION['login_user']==''){         
        echo "<script>window.location.href='index.php';</script>";
    }
$user_id=$_SESSION['login_user'];

$response=['error'=>false];


if (isset($_POST['id'])) {
	

		$sql=mysqli_query($conn,"SELECT individual.*,grouping.name as group_name,grouping.pin_color_id FROM individual LEFT JOIN grouping ON individual.group_id=grouping.id WHERE individual.status='1' AND individual.manage_role='2' AND individual.manage_by='$user_id'");
		if (mysqli_num_rows($sql)>0) {
			$count=0;
			while ($data=$sql->fetch_array()) {
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


			header('content-Type:application/json');
			echo json_encode($response);
		}
}

?>