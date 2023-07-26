<?php 
include_once("db/session.php");
$user_id=$_SESSION['login_user'];

$id=$_GET['id'];
$table=$_GET['table'];
$page=$_GET['page'];


if ($table=="company_docs") {
	$get_doc_name=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM company_docs where id='$id'"));

	$doc_name="../documents/".$get_doc_name['document'];


	if (unlink($doc_name)) {
		$delete_docment=mysqli_query($conn,"DELETE FROM company_docs WHERE id='$id'");
		if ($delete_docment) {
			$_SESSION['success']="Deleted";
			$_SESSION['error']="";
			header("Location: ".$page);
			
		}else{
			$_SESSION['success']="";
			$_SESSION['error']="Unable to delete";
			header("Location: ".$page);
			
		}
	}else{
		$_SESSION['success']="";
		$_SESSION['error']="Unable to delete";
		header("Location: ".$page);
		
	}
}else if ($table=="service_request_docs") {
	$get_doc_name=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM service_request_docs where id='$id'"));

	$doc_name="../request_document/".$get_doc_name['document'];


	if (unlink($doc_name)) {
		$delete_docment=mysqli_query($conn,"DELETE FROM service_request_docs WHERE id='$id'");
		if ($delete_docment) {
			$_SESSION['success']="Deleted";
			$_SESSION['error']="";
			header("Location: ".$page);
		}
	}else{
		$_SESSION['success']="";
		$_SESSION['error']="Unable to delete";
		header("Location: ".$page);
	}
}


 ?>