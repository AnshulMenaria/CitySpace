<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        
        #br{
            border-radius:10px;
            width: 35%;
        }
    </style>
</head>
<body style="background: lightcyan;">
<?php
    include("../include/header.php");
    include("../include/connection.php")
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px; height: 87vh;">
                    <?php
                    include("sidenav.php")
                    ?>
                </div>
                <div class="col-md-10">
                    <h4 class="my-2">Admin Dashboard</h4>
                    <div class="col-md-12 my-1">
                        <div class="row">
                            <div class="col-md-3 bg-success mx-2 my-2" style="height: 130px;" id="br">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                                $ad = mysqli_query($connect,"SELECT * FROM admin");
                                                $num = mysqli_num_rows($ad);
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Admin</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="admin.php"><i class="fa fa-users-cog fa-3x my-2" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-primary mx-2 my-2" style="height: 130px;" id="br">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8" >
                                        <?php
                                                $rec = mysqli_query($connect,"SELECT * FROM receptionist");
                                                $num = mysqli_num_rows($rec);
                                            ?>
                                            <h5 class="my-2 text-white " style="font-size: 30px;"><?php echo $num; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Hospitals</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="hospitals.php"><i class="far fa-hospital fa-4x my-2" style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-danger mx-2 my-2" style="height: 130px;" id="br">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8" >
                                        <?php
                                                $doc = mysqli_query($connect,"SELECT * FROM doctor");
                                                $num = mysqli_num_rows($doc);
                                            ?>
                                            <h5 class="my-2 text-white " style="font-size: 30px;"><?php echo $num; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Doctors</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="doctors.php"><i class="fa fa-user-md fa-3x my-2" style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px;" id="br">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8" >
                                        <?php
                                                $us = mysqli_query($connect,"SELECT * FROM user");
                                                $num = mysqli_num_rows($us);
                                            ?>
                                            <h5 class="my-2 text-white " style="font-size: 30px;"><?php echo $num; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Users</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="user.php"><i class= "far fa-user fa-3x my-2" style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>