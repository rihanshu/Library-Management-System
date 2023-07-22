<?php
$msg="";
if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
}
echo $msg;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Library Management System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- <h3><></h3> -->
    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 login-form-1">
                <h3>Admin Login</h3>
                <form action="login_server_page.php" method="get">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your Email *" value="" name="adminemail"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Your Password *" value="" name="adminpass"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                    <div class="form-group">
                        <a href="#" class="ForgetPwd">Forget Password?</a>
                    </div>
                </form>
            </div>
            <div class="col-md-6 login-form-2">
                <h3>Student Login</h3>
                <form action="loginuserserver_page.php" method="get">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your Email *" value="" name="useremail" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Your Password *" value="" name="userpass"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                    <div class="form-group">

                        <a href="registernewuser.php" class="ForgetPwd" value="Login">Not a Member? Register Now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>