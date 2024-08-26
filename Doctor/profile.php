<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Doctor Profile</title>
    <style>
          #table{
            background-color: #E4E8EF;
            border: 1px solid black;
        }
        input[type=password]{
            background: #E4E8EF;
            border: 1px solid black;
            border-radius: 10px;
        }
        input[type=text]{
            background: #E4E8EF;
            border: 1px solid black;
            border-radius: 10px;
        }
        input[type=mail]{
            background: #E4E8EF;
            border: 1px solid black;
            border-radius: 10px;
        }
        input[type=file]{
            background: #E4E8EF;
            border: 1px solid black;
            border-radius: 10px;
        }
    </style>
    </style>
    </style>
</head> 
<body style="background-image:url(../img/Profile-page.png); background-repeat:no-repeat; background-size:cover;">

<?php
include("../include/header.php");

include("../include/connection.php");

    $doc = $_SESSION['doctor'];

    $query = "SELECT * FROM doctor WHERE username='$doc'";

    $res= mysqli_query($connect,$query);

    while ($row = mysqli_fetch_array($res)) {

    $username = $row['username'];
    $profiles = $row['profile'];
        }

        ?>

        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2" style="margin-left: -30px;">
                    <?php

                        include("sidenav.php");
                        
                    ?>
                    </div>
                    <div class="col-md-10" id="up">
                         <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4><?php  echo $username; ?>'s Profile</h4>

                                    <?php
                                    

                                    if (isset($_POST['update'])) {
                            
                                    $profile = $_FILES['profile']['name'];
                            
                                     if (empty($profile)) {
                                
                                       } else {
                                    $query = "UPDATE doctor SET profile='$profile' WHERE username='$doc'";

                                    $result = mysqli_query($connect,$query);

                                    header("location:profile.php");
                                    
                                    if ($result) {
                                    move_uploaded_file($_FILES['profile']['tmp_name'], "img/$profile");
                                            }
                                    }
                                    }  
                                    ?>
                                 <form method="post" enctype="multipart/form-data">
                                    <?php 
                                    echo "<img src='img/$profiles' class='col-md-12' style='height:170px; width: 230px;'>";
                                     ?>

                                    <br><br>
                                    <div class="form-group" >
                                     <label>UPDATE PROFILE</1abel>
                                     <input type="file" name="profile" class="form-control" >
                                    </div>
                                    <br>
                                    <input type="submit" name="update" value="UPDATE" class="btn btn-success">                    
                                 </form>
                                 <?php
                                    $doc = $_SESSION['doctor'];
                                    $query = "SELECT * FROM doctor WHERE username='$doc'";
                                    $res = mysqli_query($connect, $query);
                                    $row = mysqli_fetch_array($res)
                                 ?>
                                 <div class="my-3">
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th colspan="2" class="text-center" id="table">
                                            ----------Details----------</th>
                                        </tr>
                                        <tr>
                                            <td id="table">Username</td>
                                            <td id="table"><?php echo $row['username']; ?></td>
                                        </tr>
                                        <tr>
                                            <td id="table">Password</td>
                                            <td id="table"><?php echo $row['password']; ?></td>
                                        </tr>
                                        <tr>
                                            <td id="table">Contact</td>
                                            <td id="table"><?php echo $row['contact']; ?></td>
                                        </tr>
                                        <tr>
                                            <td id="table">Email</td>
                                            <td id="table"><?php echo $row['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <td id="table">Qualification</td>
                                            <td id="table"><?php echo $row['qualification']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                </div>
                        <div class="col-md-6">
                            <?php
                                if (isset($_POST['change'])) {
                                    $uname = $_POST['uname'];

                                    if (empty($uname)) {

                                    }else{
                                        $query = "UPDATE doctor SET username='$uname' WHERE username='$doc'";

                                        $res = mysqli_query($connect,$query);
                                        
                                        header("location:profile.php");

                                        if($res) {

                                            $_SESSION['doctor'] = $uname;
                                        }
                                    }
                                }
                            ?>
                            <form method="post">
                                    <label>Change Username</label>
                                    <input type="text" name="uname" class="form-control" autocomplete="off"><br>
                                    <input type="submit" value="Change" name="change" class="btn btn-success">
                            </form>
                            <br>
                            <?php
                                if (isset($_POST['update_pass'])) {
                                    $old_pass = $_POST['old_pass'];
                                    $new_pass = $_POST['new_pass'];
                                    $con_pass = $_POST['con_pass'];

                                    $error = array();
                                    
                                    $old = mysqli_query($connect,"SELECT * FROM doctor WHERE username='$doc'");

                                    $row = mysqli_fetch_array($old);
                                    $pass = $row['password'];
                                    if (empty($old_pass)) {
                                        $error['p'] = "Enter Old Password";
                                    }else if(empty($new_pass)) {
                                        $error['p'] = "Enter New Password";
                                    }else if(empty($con_pass)) {
                                        $error['p'] = "Confirm Password";
                                    }else if($old_pass != $pass){
                                        $error['p'] = "Invalid Old Password";
                                    }else if($new_pass != $con_pass){
                                        $error['p'] = "Password does not match";

                                    }

                                        if (count($error)==0) {
                                            $query = "UPDATE doctor SET password='$new_pass' WHERE username='$doc'";

                                            mysqli_query($connect,$query);
                                            header("location:profile.php");
                                        }
                                }

                                if (isset($error['p'])) {
                                    $e = $error['p'];

                                    $show = "<h5 class='text-center alert alert-danger'>$e</h5>";
                                }else{
                                    $show = "";
                                }
                            ?>
                    

                            <form method="post">
                                <h5 class="text-center my-4">Change Password</h5>
                                <div>
                                    <?php
                                        echo $show;
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Old Password</label>
                                    <input type="password" name="old_pass" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">New Password</label>
                                    <input type="password" name="new_pass" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="con_pass" id="" class="form-control">
                                </div><br>
                                <input type="submit" value="Update Password" name="update_pass" class="btn btn-success">

                            </form>
                            </form>

                        </div>
                    </div>
                </div>
            </div>     
        </div>  