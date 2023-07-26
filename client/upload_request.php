<?php
   include_once("session.php");
   $user_id=$_SESSION['login_user'];
   $user_email=$_SESSION['email'];
   $user_name=$_SESSION['username'];
   $manage_by=$_SESSION['manage_by'];
   $manage_role=$_SESSION['manage_role'];
// if(!empty($_FILES)){

   $sid=$_POST['sid'];
   
   $description=$_POST['description'];
   $description =str_replace("'", "&apos;", $description);
    $description=str_replace('"', "&quot;", $description);
      
   $query="INSERT INTO service_requests (`service_id`, `individual_id`, `description`) VALUES ('$sid','$user_id','$description')";
   $add_re=mysqli_query($conn,$query);
   $count=0;  
   if ($add_re==true) {
      $msg="";
      $get_id=mysqli_fetch_array(mysqli_query($conn,"SELECT id FROM service_requests WHERE `service_id`='$sid' AND `individual_id`='$user_id' AND `description`='$description'"));
      $req_id=$get_id['id'];
      foreach($_FILES["file"]["name"] as $key=>$name) {
         
         $image_Name = uniqid().date("Y-m-d-H-i-s").$_FILES['file']['name'][$key];
          
         // File path configuration
         $uploadDir = "../request_document/";
         $fileName = basename($_FILES['file']['name'][$key]);
         $uploadFilePath = $uploadDir.$image_Name;


         if (move_uploaded_file($_FILES['file']['tmp_name'][$key], $uploadFilePath)) {
            $add_doc=mysqli_query($conn,"INSERT INTO service_request_docs(service_request_id, document,added_by,added_role) VALUES('$req_id','$image_Name','$user_id','3')");
            if ($add_doc==true) {
                  $msg=$req_id;
                  $count++;
            }
         }
      }


      $get_admin_email=mysqli_fetch_array(mysqli_query($conn,"SELECT email from admin where id ='1'"));
      $admin_email=$get_admin_email['email'];

      $get_service_name=mysqli_fetch_array(mysqli_query($conn,"SELECT title from services where id ='$sid'"));
      $service_name=$get_service_name['title'];

      if ($manage_role=="0") {
          $email=$admin_email;
      }else if($manage_role=="1"){
          $get_email=mysqli_fetch_array(mysqli_query($conn,"SELECT email from supervisor where id ='$manage_by'"));
          $email=$get_email['email'];
      }else if($manage_role=="2"){
          $get_email=mysqli_fetch_array(mysqli_query($conn,"SELECT email from employee where id ='$manage_by'"));
          $email=$get_email['email'];
      }

      $to = $email;
      $subject = 'Service Request Document | Cystan client ';
      $from = '$user_email';
      
      // To send HTML mail, the Content-type header must be set
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      
      // Create email headers
      $headers .= 'From: '.$from."\r\n".
          'Cc: '.$admin_email . "\r\n".
          'Reply-To: '.$from."\r\n" .

          'X-Mailer: PHP/' . phpversion();
      
      // Compose a simple HTML email message
      $htmlContent = ' 
                     <html> 
                      <head> 
                          <title</title> 
                      </head> 
                      <body> 
      
                           <p> $user_name sent you a new request</p><br>
                          <h3>Request Info</h3> 
                          <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
                              <tr> 
                                  <th>Service Name:</th><td>'.$service_name.'</td> 
                              </tr> 
                              <tr style="background-color: #e0e0e0;"> 
                                  <th>Number Of Documents:</th><td>'.$count.'</td> 
                              </tr>
                              <tr style="background-color: #e0e0e0;"> 
                                <th>Description:</th><td>'.$description.'</td> 
                               </tr> 
                          </table> 
                      </body>
                       
                      </html>'; 

      

      if(mail($to, $subject, $htmlContent, $headers)){
         echo $msg;
      }

   }     
     
                     

?>