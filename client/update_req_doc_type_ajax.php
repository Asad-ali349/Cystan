<?php
 include_once("session.php");
$doc_type = $_GET['doc_type'];
$file_id = $_GET['file_id'];


$update_query="UPDATE service_request_docs SET type= '$doc_type' WHERE id='$file_id'";
$exe_query=mysqli_query($conn, $update_query);

if ($exe_query) {
    echo "data updated";
}




?>