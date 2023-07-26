<?php  
include_once("db/session.php"); 

$response=['error'=>true];
$user_id=$_SESSION['login_user'];

if (isset($_POST['id']) && isset($_POST['reason'])) {
    $reason=$_POST['reason'];
    $id=$_POST['id'];
    
        $addGroup=mysqli_query($conn,"UPDATE reason_of_letter SET reason='$reason' WHERE id='$id'");
       
        if($addGroup==TRUE) {
            $response['error']=false;
            $response['msg']="Update Successfully";
            header('content-Type:application/json');
            echo json_encode($response);
        }else{
            $response['msg']=$conn->error;
            header('content-Type:application/json');
            echo json_encode($response);        
        }
     
}


?>