<?php
session_start();

include("../include/connection.php");

if (isset($_POST['login'])){
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    if (empty($username)) {
        $error['user'] = "Enter Username";
    } else if(empty($password)) {
    $error['user'] = "Enter Password";
    }

    if (count($error)==0) {
        $query = "SELECT * FROM user WHERE contact='$username' AND password='$password'";

        $result = mysqli_query($connect,$query);

        if (mysqli_num_rows($result) == 1) {
            echo "<script>alert('You have logged in as an User')</script>";
            
            $_SESSION['user'] = $username;

            header("Location:../user/index.php");
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
    <title>User Login</title>
<style>

    #body{
    font-family: 'Roboto', sans-serif;
    }

    .login-box {
    height: 100vh;
    background: #FDFDFD;
    
    }
    .login-title {
    text-align: center;
    font-size: 30px;
    letter-spacing: 2px;
    margin-top: 80px;
    font-weight: bold;
    color: grey;
    }

    .login-form {
    margin-top: 25px;
    text-align: left;
    }

    input[type=text] {
    border: none;
    border-bottom: 2px solid black;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    
    margin-bottom: 20px;
    padding-left: 0px;
    color: grey;
    }

    input[type=password] {
    border: none;
    border-bottom: 2px solid black;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    padding-left: 0px;
    margin-bottom: 20px;
    color: grey;
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
    p{
        font-size: 12px;
        color: gray;
    }
    span{
        margin-left: 150px;
    }
    
    .form-control-label {
    font-size: 10px;
    color: #6C6C6C;
    font-weight: bold;
    letter-spacing: 1px;
    }

    .btn-outline-primary {
    font-weight: bold;
    letter-spacing: 1px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    }

    .btn-outline-primary:hover {
    background-color: #76D7C4;
    right: 0px;
    }
    .login-button {
    padding-right: 0px;
    text-align: right;
    margin-bottom: 25px;
    }

    .login-text {
    text-align: left;
    padding-left: 0px;
    color: #76D7C4;
    }
</style>
</head>
<body id="body" style="background-image:url(../img/Pat-Log-bg.jpg); background-repeat:no-repeat; background-size:cover;"> 

<?php
include("../include/API.php")
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5"></div>
            <div class="col-lg-5 col-md-10 login-box">
                <div class="col-lg-12 login-title">
                    USER LOGIN
                </div>
                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                    <form method="post">
                        <div class="form-group">
                        <label class="form-control-label">Username</label>
                            <input type="text" name="uname" class="form-control" placeholder="Enter Your Mobile Number" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Password</label>
                            <input type="password" name="pass" placeholder="Enter Your Password" class="form-control" i>
                            <p>Don't Have An Account? <a href="registration.php" style="text-decoration: none;">Click here</a><span><a href="../index.php">Home</a></span></p>
                        </div>     
                        <div class="col-lg-7 login-btm login-button">
                            <button type="submit" name="login" class="btn btn-outline-primary">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>