<?php

$servername = "localhost";
$username = "root";
$passwordd = "";
$dbname = "cystan";

$conn=new mysqli($servername,$username,$passwordd,$dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>