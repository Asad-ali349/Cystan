<?php 
include_once("db/session.php"); 
$response=['error'=>true];
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])&& isset($_POST['id'])&& isset($_POST['managerole'])&& isset($_POST['manageby'])) {
	$email=$_POST['email'];
	$name=$_POST['name'];
	$password=$_POST['password'];
	$cid=$_POST['id'];
	$mrole=$_POST['managerole'];
	$mby=$_POST['manageby'];

	$get_data=mysqli_query($conn,"SELECT * FROM individual WHERE email='$email'");
	if ($get_data->num_rows > 0) {
		$data=mysqli_fetch_array($get_data);
		$ind_id=$data['id'];
		$manage_by=$data['manage_by'];
		$manage_role=$data['manage_role'];

		$set_ownby=mysqli_query($conn,"UPDATE company SET owned_by='$ind_id',managed_by='$manage_by',manage_role='$manage_role' WHERE id='$cid'");
		if ($set_ownby==true) {
			// $to = $email;
			 //    $subject = 'Login Credential | Cystan client Portal';
			 //    $from = 'Cystan';
			    
			 //    // To send HTML mail, the Content-type header must be set
			 //    $headers  = 'MIME-Version: 1.0' . "\r\n";
			 //    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			    
			 //    // Create email headers
			 //    $headers .= 'From: '.$from."\r\n".
			 //        'Reply-To: '.$from."\r\n" .
			 //        'X-Mailer: PHP/' . phpversion();
			    
			 //    // Compose a simple HTML email message
			 //    $message = '<html>
			 //                <body>';
			 //    $message .= '<h1>Greetings,</h1>';
			 //    $message .= '<p style="font-size:18px;">Your login Credential for Cystan client portal are: </p>';
			 //    $message .= '<a href="" class="btn btn-primary" target="blank">cystan.com</a>';
			 //    $message .= '<p><br>Email: </p>'.$email;
			 //    $message .= ' <p>Password: </p>'.$password;
			 //    $message .= '</body></html>';

			    

			 //    if(mail($to, $subject, $message, $headers)){
						$response['error']=false;
						$response['msg']="Login Successfully Sent";
						header('content-Type:application/json');
						echo json_encode($response);
					// }	
		}else{
			$response['msg']= "Error: " . $sql . "<br>" . $conn->error;
			header('content-Type:application/json');
			echo json_encode($response);
		}
	}else{
		$sql=mysqli_query($conn,"INSERT INTO individual(name,email,password,manage_role,manage_by) VALUES('$name','$email','$password','$mrole','$mby')");
		if ($sql==true) {
			$get_id=mysqli_query($conn,"SELECT id from individual where email='$email'");
			$data=mysqli_fetch_array($get_id);
			$ind_id=$data['id'];
			$set_ownby=mysqli_query($conn,"UPDATE company SET owned_by='$ind_id' WHERE id='$cid'");
			if ($set_ownby) {
				// $to = $email;
			 //    $subject = 'Login Credential | Cystan client Portal';
			 //    $from = 'Cystan';
			    
			 //    // To send HTML mail, the Content-type header must be set
			 //    $headers  = 'MIME-Version: 1.0' . "\r\n";
			 //    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			    
			 //    // Create email headers
			 //    $headers .= 'From: '.$from."\r\n".
			 //        'Reply-To: '.$from."\r\n" .
			 //        'X-Mailer: PHP/' . phpversion();
			    
			 //    // Compose a simple HTML email message
			 //    $message = '<html>
			 //                <body>';
			 //    $message .= '<h1>Greetings,</h1>';
			 //    $message .= '<p style="font-size:18px;">Your login Credential for Cystan client portal are: </p>';
			 //    $message .= '<a href="" class="btn btn-primary" target="blank">cystan.com</a>';
			 //    $message .= '<p><br>Email: </p>'.$email;
			 //    $message .= ' <p>Password: </p>'.$password;
			 //    $message .= '</body></html>';

			    

			 //    if(mail($to, $subject, $message, $headers)){
						$response['error']=false;
						$response['msg']="Login Successfully Sent";
						header('content-Type:application/json');
						echo json_encode($response);
					// }
			}else{
				$response['msg']= "Error: " . $sql . "<br>" . $conn->error;
				header('content-Type:application/json');
				echo json_encode($response);
			}
			
		}else{
			
			$response['msg']="Unable to send Credentials";
			header('content-Type:application/json');
			echo json_encode($response);
		}
	}


	

}else{
	
	$response['msg']="parameters not found";
	header('content-Type:application/json');
	echo json_encode($response);
}


?>