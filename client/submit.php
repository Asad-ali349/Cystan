<?php 
include_once("db/session.php"); 
require('stripe_config.php');


// echo "<pre>";
// print_r($_POST);
$rid=$_GET['id'];
$get_request_info=mysqli_fetch_array(mysqli_query($conn,"SELECT * from service_requests WHERE id='$rid'"));
$price=100*(float)$get_request_info['price'];

$token=$_POST['stripeToken'];
$data=\Stripe\Charge::create(array(
	"amount"=>"$price",
	"currency"=>"usd",
	"description"=>"Additions to Credit Report",
	"source"=>$token,

));

if ($data['status']=="succeeded") {

	$transaction_id=$data['id'];
	$amount=$data['amount'];
	$add_transaction=mysqli_query($conn,"INSERT INTO transactions(req_id,transaction_id,amount) Values('$rid','$transaction_id','$amount')");
	if ($add_transaction) {
		$change_status=mysqli_query($conn,"UPDATE service_requests SET status='2' where id='$rid'");
		if ($change_status) {
			header("Location: request_detail_page.php?id=".$rid);
		}else{
			echo $conn->error;	
		}
	}else{
		echo $conn->error;
	}
}
else{
	echo "not";
}

?>