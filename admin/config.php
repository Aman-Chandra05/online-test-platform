<?php
session_start();
 $dbhost="localhost";
 $dbuser="root";
 $dbpassword="";
 $dbname="testplatform";

 // Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
