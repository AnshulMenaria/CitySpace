<?php
session_start();

include("../include/connection.php");

 if (isset($_POST['create'])) {
    $name = $_POST['uname'];
    $con = $_POST['con'];
    $em = $_POST['em'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $password = $_POST['pass'];
    $con_pass = $_POST['con_pass'];

    $error = array();

    if (empty($name)) {
        $error['ac'] = "Enter Your Name";
    }elseif (empty($con)) {
        $error['ac'] = "Enter Your Mobile Number";
    }elseif (empty($em)) {
        $error['ac'] = "Enter Your Email";
    }elseif (empty($age)) {
        $error['ac'] = "Enter Your Age";
    }elseif ($gender == "") {
        $error['ac'] = "Select Your Gender";
    }elseif ($city == "") {
        $error['ac'] = "Select Your City";
    }elseif (empty($password)) {
        $error['ac'] = "Enter Your Password";
    }elseif ($con_pass != $password) {
        $error['ac'] =  "Password Doesn't Match";
    }
    include("../include/connection.php");
    $s = "select id from user order by id desc";
    $rs = mysqli_query($connect, $s);
    $id = 0;
    while ($r = mysqli_fetch_array($rs)) {
        $id = $r[0];
        break;
    }
    if ($id == 0)
    {
        $id = 1;
        
    }
    else
    {
        $id = $id + 1;

    }

    if (count($error)==0) {
        
        $query = "INSERT INTO user(id,name,contact,email,age,gender,city,password) VALUES('$id'.'$name','$con','$em','$age','$gender','$city','$password')";
        
        $res = mysqli_query($connect,$query);

        if ($res) {
            header("Location:userlogin.php");
        }else {
            echo "<script>alert('failed')</script>";
        }
    }


 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>

        body{
        font-family: 'Roboto', sans-serif;
        }    
        .form-group {
    margin-bottom: 40px;
    outline: 0px;
    }
        input[type=text] {
        border: none;
        border-bottom: 2px solid black;
        border-top: 0px;
        border-radius: 0px;
        font-weight: bold;
        padding-left: 0px;
        color: grey;
        background-color: #D0E8EE;
        }
        input[type=number] {
        border: none;
        border-bottom: 2px solid black;
        border-top: 0px;
        border-radius: 0px;
        font-weight: bold;
        padding-left: 0px;
        color: grey;
        background-color: #D0E8EE;
        }
    
        input[type=password] {
        border: none;
        border-bottom: 2px solid black;
        border-top: 0px;
        border-radius: 0px;
        font-weight: bold;
        padding-left: 0px;
        color: grey;
        background-color: #D0E8EE;
        }
        input[type=email] {
        border: none;
        border-bottom: 2px solid black;
        border-top: 0px;
        border-radius: 0px;
        font-weight: bold;
        padding-left: 0px;
        color: grey;
        background-color: #D0E8EE;
        }
        #select{
        border: 2px solid black;
        border-radius: 2px;
        font-weight: bold;
        padding-left: 0px;
        color: grey;
        background-color: #D0E8EE;
        }
        p{
            font-size: 12px;
            color: gray;
        }
    </style>
</head>
<body style="background-image:url(../img/Reg-bg.jpg); background-repeat:no-repeat; background-size:cover;">
<?php
    include("../include/API.php")
?>
 <div class="container-fluid" >
    <div class="col-md-14">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 my-2 " style="background-color: D0E8EE">
                <h1 class="text-center text-secondary my-2">Create Account</h1>

                <form method="post">
                    <div class="form-group">    
                        
                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter your name">
                    </div>
                    <div class="form-group">    
                        
                        <input type="number" name="con" class="form-control" autocomplete="off" placeholder="Mobile Number">
                    </div>
                    <div class="form-group">    
                        
                        <input type="text" name="em" class="form-control" autocomplete="off" placeholder="Enter Your E-mail">
                    </div>
                    <div class="form-group">    
                        
                        <input type="number" name="age" class="form-control" autocomplete="off" placeholder="Enter Your Age">
                    </div>
                    <div class="form-group">    
                        
                        <select name="gender" class="form-control" id="select">
                            <option value="">---Select Your Gender---</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">    
                        
                        <select name="city" class="form-control" id="select">
                            <option value="">---Select Your City---</option>
                            <option value="Udaipur">Udaipur</option>
                        </select>
                    </div>
                    <div class="form-group">    
                        
                        <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Your Password">
                    </div>
                    <div class="form-group">    
                        
                        <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Re-Enter Your Password">
                    </div>
                    <input type="submit" name="create" value="Create Account" class="btn btn-success">
                    <p>already have an account <a href="userlogin.php">click here</a></p>
                </form>
            </div>
        </div>
    </div>
 </div>
</body>
</html>