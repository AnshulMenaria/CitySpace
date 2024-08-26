<?php
session_start();

include("../include/connection.php");

if (isset($_POST['login'])){
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    if (empty($username)) {
        $error['doctor'] = "Enter Username";
    } else if(empty($password)) {
    $error['doctor'] = "Enter Password";
    }

    if (count($error)==0) {
        $query = "SELECT * FROM doctor WHERE username='$username' AND password='$password'";

        $result = mysqli_query($connect,$query);

        if (mysqli_num_rows($result) == 1) {
            echo "<script>alert('You have logged in as an Doctor')</script>";
            
            $_SESSION['doctor'] = $username;

            header("Location:../doctor/index.php");
            exit();
        }else{
            echo "<script>alert('Invalid Username or Password')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title>
<style>

#body{
    font-family: 'Roboto', sans-serif;
    }

    .login-box {
    margin-top: 80px;
    height:100vh;
    background: #74B3C4;
    text-align: center;
    
    }
    .login-title {  
    text-align: center;
    font-size: 30px;
    letter-spacing: 2px;
    margin-top: 80px;
    font-weight: bold;
    color: darkslategray;
    }

    .login-form {
    margin-top: 25px;
    text-align: left;
    }

    input[type=text] {
    background-color: #74B3C4;
    border: none;
    border-bottom: 2px solid aqua;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    margin-bottom: 20px;
    padding-left: 0px;
    color: #ECF0F5;
    }

    input[type=password] {
    background-color: #74B3C4;
    border: none;
    border-bottom: 2px solid aqua;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    padding-left: 0px;
    margin-bottom: 20px;
    color: #ECF0F5;
    }

    .form-group {
    margin-bottom: 40px;
    outline: 0px;
    }

    .form-control:focus {
    border-color: inherit;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-bottom: 2px solid #0DB8DE;
    outline: 0;
    background-color: #1A2226;
    color: #ECF0F5;
    }

    input:focus {
    outline: none;
    box-shadow: 0 0 0;
    }

    label {
    margin-bottom: 0px;
    }

    .form-control-label {
    font-size: 10px;
    color: #6C6C6C;
    font-weight: bold;
    letter-spacing: 1px;
    }

    .btn-outline-primary {
    border-color: #0DB8DE;
    color: #0DB8DE;
    border-radius: 0px;
    font-weight: bold;
    letter-spacing: 1px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    }

    .btn-outline-primary:hover {
    background-color: #0DB8DE;
    right: 0px;
    }

    .login-btm {
    float: left;
    }

    .login-button {
    padding-right: 0px;
    text-align: right;
    margin-bottom: 25px;
    }

    .login-text {
    text-align: left;
    padding-left: 0px;
    color: #A2A4A4;
    }

    .loginbttm {
    padding: 0px;
    }
</style>
</head>
<body id="body" style="background-image:url(../img/Doc-Log-bg.png); background-repeat:no-repeat; background-size:cover;"> 

<?php
include("../include/API.php")
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-title">
                    WELCOME BACK
                </div>
                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                    <form method="post">
                        
                        <div class="form-group">
                            <label class="form-control-label">Username</label>
                            <input type="text" name="uname" value="Dr." class="form-control" autocomplete="off" >
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Password</label>
                            <input type="password" name="pass" class="form-control" i>
                            <a href="receptionistlogin.php" style="text-decoration: none;">Hospital Login</a>
                        </div>
                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                   
                            </div>
                            <div class="col-lg-7 login-btm login-button">
                                <button type="submit" name="login" class="btn btn-outline-primary">LOGIN</button>
                            </div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>