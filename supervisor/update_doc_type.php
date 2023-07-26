<?php
include_once("db/session.php");
$doc_id= $_POST['document_id'];
$typeid= $_POST['typeid'];

$update_doc=mysqli_query($conn,"UPDATE company_docs SET type='$typeid' WHERE id='$doc_id'");
if ($update_doc==true) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);

}
?>