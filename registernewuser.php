<?php

$msg = "";
if (!empty($_REQUEST['msg'])) {
    $msg = $_REQUEST['msg'];
}

?>


<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <style>
        input[type=submit]:hover {
            background-color: #45a049;
        }

        input,
        select {
            width: 60%;
            padding: 6px 10px;
            margin: 8px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        h3 {
            text-align: center;
        }

        input[type=submit] {
            width: 45%;

            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form {

            background-color: #caffc1;
            text-align: center;
            padding: 40px;

        }
        #addstudent{
            width:45%;
            margin:0 auto;
            margin-top: 8%;
        }
        .formstyle {

width: 70%;
text-align: right;
}
.loginLink{
    color: green;
    font-weight: 600;
    text-decoration: none;
}


    </style>
</head>

<body>

<div class="alert alert-success">
        <strong>
            <?php echo $msg ?>
        </strong>
    </div>

    <div id="addstudent" class="tabcontent">
        <div>
            <form action="registeruser_server_page.php" method="post">
                <h3>REGISTER</h3>
                <div class="formstyle">
                    <label for="username">Name: </label><input type="text" name="username" id="username"> <br>
                    <label for="useremail">Email: </label><input type="email" name="useremail" id="useremail"> <br>
                    <label for="userpass">Password: </label><input type="text" name="userpass" id="userpass"> <br>
                    <label>Choose Type: </label><select name="type">
                        <option value="student">student</option>
                        <option value="teacher">teacher</option>
                    </select><br>
                </div>
                <input type="submit" value="SUBMIT"><br>
                <a href="index.php" class="loginLink" value="Login">Login</a>
            </form>
        </div>

    </div>

    <script src="" async defer></script>
</body>

</html>