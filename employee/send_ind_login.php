<?php 
include_once("db/session.php"); 
$response=['error'=>true];
if (isset($_POST['email']) && isset($_POST['password'])&& isset($_POST['id'])) {
	$email=$_POST['email'];
	$password=$_POST['password'];
	$cid=$_POST['id'];

	$get_data=mysqli_query($conn,"SELECT * FROM individual WHERE email='$email'");
	if ($get_data->num_rows > 0) {
		$sql=mysqli_query($conn,"UPDATE individual SET password='$password' WHERE email='$email'");
			if ($sql==true) {
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
				$response['msg']="The link has been sent successfully via email!";
				header('content-Type:application/json');
				echo json_encode($response);
			    // }
			
		}else{
			
			$response['msg']="Unable to send Login";
			header('content-Type:application/json');
			echo json_encode($response);
		}
	}else{
		$response['msg']="Email Not Found";
		header('content-Type:application/json');
		echo json_encode($response);
	}


	

}else{
	
	$response['msg']="parameters not found";
	header('content-Type:application/json');
	echo json_encode($response);
}


?>