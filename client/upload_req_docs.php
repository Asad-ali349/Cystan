<?php  
    include_once("session.php");
    $user_id=$_SESSION['login_user'];
    $user_email=$_SESSION['email'];
    $user_name=$_SESSION['username'];
    $manage_by=$_SESSION['manage_by'];
    $manage_role=$_SESSION['manage_role'];
// if(!empty($_FILES)){
    $id=$_GET['id'];
   $o_name=$_FILES['file']['name'];
   $image_Name = uniqid().date("Y-m-d-H-i-s").$_FILES['file']['name'];
   
   // File path configuration
   $uploadDir = "../request_document/";
   $fileName = basename($_FILES['file']['name']);
   $uploadFilePath = $uploadDir.$image_Name;

       // Upload file to server
      if( move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath)){


           // Insert file information in the database
       $query="INSERT INTO service_request_docs(service_request_id, document,added_by,added_role) VALUES('$id','$image_Name','$user_id','3')";
       // var_dump($query);
       $add=mysqli_query($conn,$query);
       if ($add) {
            // $get_admin_email=mysqli_fetch_array(mysqli_query($conn,"SELECT email from admin where id ='1'"));
            // $admin_email=$get_admin_email['email'];

            // if ($manage_role=="0") {
            //     $email=$admin_email;
            // }else if($manage_role=="1"){
            //     $get_email=mysqli_fetch_array(mysqli_query($conn,"SELECT email from supervisor where id ='$manage_by'"));
            //     $email=$get_email['email'];
            // }else if($manage_role=="2"){
            //     $get_email=mysqli_fetch_array(mysqli_query($conn,"SELECT email from employee where id ='$manage_by'"));
            //     $email=$get_email['email'];
            // }

            // $to = $email;
            // $subject = 'Service Request Document | Cystan client ';
            // $from = '$user_email';
            
            // // To send HTML mail, the Content-type header must be set
            // $headers  = 'MIME-Version: 1.0' . "\r\n";
            // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            
            // // Create email headers
            // $headers .= 'From: '.$from."\r\n".
            //     'Cc: '.$admin_email . "\r\n".
            //     'Reply-To: '.$from."\r\n" .

            //     'X-Mailer: PHP/' . phpversion();
            
            // // Compose a simple HTML email message
            // $message = '<html>
            //             <body>';
            // $message .= '<h1>Greetings,</h1>';
            // $message .= '<p style="font-size:18px;">$username sent you a new document </p>';
            // $message .= '</body></html>';

            

            // if(mail($to, $subject, $message, $headers)){
                echo "added";
            // }
           
       }else{
            echo $conn->error;
       }
    
      }
                      
    // }

?>