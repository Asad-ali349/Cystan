<?php  
    include_once("db/session.php");
    $user_id=$_SESSION['login_user'];
// if(!empty($_FILES)){
    $id=$_GET['id'];
   $o_name=$_FILES['file']['name'];
    $is_company=$_GET['is_company'];
   $image_Name = uniqid().date("Y-m-d-H-i-s").$_FILES['file']['name'];
   
   // File path configuration
   $uploadDir = "../documents/";
   $fileName = basename($_FILES['file']['name']);
   $uploadFilePath = $uploadDir.$image_Name;

       // Upload file to server
      if( move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath)){


           // Insert file information in the database
       $query="INSERT INTO company_docs (company_id,name,document,is_company,added_by,added_role) VALUES ('$id','$o_name','".$image_Name."','$is_company','$user_id','0')";
       var_dump($query);
       mysqli_query($conn,$query);
       
      }
                      
    // }

?>