<?php  
    include_once("db/session.php");
    $user_id=$_SESSION['login_user'];
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
       $query="INSERT INTO service_request_docs(service_request_id, document,added_by,added_role) VALUES('$id','$image_Name','$user_id','0')";
       // var_dump($query);
       $add=mysqli_query($conn,$query);
       if ($add) {
           echo "added";
       }else{
            echo $conn->error;
       }
       
      }
                      
    // }

?>