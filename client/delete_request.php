<?php
include_once("db/session.php"); 
$iD=$_GET['id'];
$table=$_GET['table'];
$page=$_GET['page'];
$status=$_GET['status'];
$response=['error'=>true];
$query="UPDATE ".$table." SET is_deleted=".$status." WHERE id=".$iD;

$delete=mysqli_query($conn,$query);
if ($delete==true) {
	$_SESSION['success']="Deleted Successfully";
	header("Location: ".$page);
}else{
	$_SESSION['error']="You cannot delete because this data is used somewhere";
	header("Location: ".$page);
}
?>