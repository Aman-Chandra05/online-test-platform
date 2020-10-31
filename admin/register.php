<?php
include 'config.php';
if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['password']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
}
$sql="SELECT * FROM adminuser WHERE email='$email'";
$res=$conn->query($sql);
if($res->num_rows>0)
{
    echo "present";
}
else
{
    $sql="INSERT INTO `adminuser`(`username`, `email`, `password`) VALUES ('$name','$email','$password')";
    $res=$conn->query($sql);
    echo "inserted";
}



?>