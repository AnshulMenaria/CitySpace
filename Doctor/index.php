<?php
session_start();
?>

<!DOCTYPE html> 
    <html>
<head>
    <title>Doctor's Dashboard</title>
    <style>
        #br{
            border-radius:10px;
            width: 35%;
        }
    </style>
</head>
<body style="background-image:url(../img/Doc-Dash-bg.jpg); background-repeat:no-repeat; background-size:cover;">
    <?php
        include("../include/header.php");
        include("../include/connection.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px; height: 85vh;">
                    <?php
                        include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <h4 class="my-2" style="color: darkslategray;">Doctor's Dashbord</h4>
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3 my-2 bg-success" style="height: 150px;" id="br">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                            <?php
                                                $doc = mysqli_query($connect,"SELECT * FROM doctor");
                                                $num = mysqli_num_rows($doc);
                                            ?>
                                                <h5 class="text-white my-4">My Profile</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="profile.php"><i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-md-3 my-2 bg-danger mx-2" style="height: 150px;" id="br">
                                    <div class="col-md-11">
                                        <div class="row">
                                            <div class="col-md-8">
                                            <?php
                                                $doc = $_SESSION['doctor'];
                                                $doc = mysqli_query($connect,"SELECT * FROM patient WHERE doctor = '$doc'");
                                                $num = mysqli_num_rows($doc);
                                            ?>
                                                <h1 class="text-white my-2"><?php echo $num; ?></h1>
                                                <h2 Patient class="text-white my-0">Total Appointments</h2>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="patient.php"><i class="fa fa-procedures fa-3x my-3" style="color: white;"></i></a>
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
    </div>
</body>
</html>