<?php
include 'config.php';
$login_msg='';
$reg_msg='';
if(isset($_POST['reg']))
{
    if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['password']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
    }
    $sql="SELECT * FROM users WHERE email='$email'";
    $res=$conn->query($sql);
    if($res->num_rows>0)
    {
        $reg_msg="Email already registered";
    }
    else
    {
        $sql="INSERT INTO `users`(`username`, `email`, `password`) VALUES ('$name','$email','$password')";
        $res=$conn->query($sql);
        $reg_msg="Registration sucessfull";
    }    
}
if(isset($_POST['login']))
{
    if(isset($_POST['email']) && isset($_POST['password']))
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
    }
    $sql="SELECT * FROM users WHERE email='$email'AND password='$password'";
    $res=$conn->query($sql);
    if($res->num_rows>0)
    {
        $row=$res->fetch_assoc();
        $_SESSION['username']=$row['username'];
        $_SESSION['loginstatus']='active';
        $_SESSION['user_id']=$row['user_id'];
        header('location:index.php');
    }
    else
    {
        $login_msg="Enter correct details";
    }
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Test Platform</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="javascripts/main.js"></script>

    </head>
    <body>
    <div>
       <h1>Welcome</h1>
    </div>
        <div class="container">
            <div id="login_form">
                <div>
                    <h3>Login Form </h3>
                </div>
                <div>
                <form method="post" action="account.php">
                        Email
                        <input type="email" name="email" required>
                        Password
                        <input type="password" name="password" required>
                        <input type="submit" value="Login" name="login">
                    </form>
                </div>
                <div><?php echo $login_msg; ?></div>
            </div>
            <div id="reg_form">
                <div>
                   <h3> Registration Form</h3>
                </div>
                <div>
                    <form method="post" action="account.php">
                        Username
                        <input type="text"  required name="name">
                        Email
                        <input type="email" name="email" required>
                        Password
                        <input type="password" name="password" required> 
                        <input type="submit" value="Register" name="reg">
                    </form>
                </div>
                <div><?php echo $reg_msg; ?></div>
            </div>
        </div>
    </body>
</html>