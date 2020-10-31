<!DOCTYPE html>
<html>
    <head>
        <title>Test Platform</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="javascripts/main.js"></script>

    </head>
    <body>
        <div>
            <div>
                <h1>Welcome</h1>
            </div>
            <div>
                <div>
                    Login Form
                </div>
                <div>
                    <form>
                        Email
                        <input type="email" name="email" required id="login_email">
                        Password
                        <input type="password" name="password" required id="login_pass">
                        <input type="button" value="Login" id="loginbtn">
                    </form>
                </div>
                <div id="log_msg"></div>
            </div>
            <div>
                <div>
                    Registration Form
                </div>
                <div>
                    <form>
                        Username
                        <input type="text"  required id="regname">
                        Email
                        <input type="email" name="email" required id="regemail">
                        Password
                        <input type="password" name="password" required id="regpass"> 
                        <input type="button" value="Register" id="regbtn">
                    </form>
                </div>
                <div id="reg_msg"></div>
            </div>

        </div>
    </body>
</html>