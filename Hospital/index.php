<?php
session_start();
?>

<!DOCTYPE html> 
    <html>
<head>
    <title>Receptionist's Dashboard</title>
    <style>
        #br{
            border-radius:10px;
            width: 35%;
        }
    </style>
</head>
<body style="background-image:url(../img/Rec-Dash-bg.jpg); background-repeat:no-repeat; background-size:cover;">
    <?php
        include("../include/header.php");
        include("../include/connection.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px; height: 86vh;">
                    <?php
                        include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <h4 class="my-2" style="color: darkslategray;">Hospital Dashbord</h4>
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2 my-1 bg-success mx-1" style="height: 130px;" id="br">
                                    <div class="col-md-11">
                                        <div class="row">
                                            <div class="col-md-8">
                                            <?php
                                                $rec = $_SESSION['receptionist'];
                                                $rec = mysqli_query($connect,"SELECT * FROM patient WHERE hospital ='$rec'");
                                                $num = mysqli_num_rows($rec);
                                            ?>
                                                <h1 class="text-white my-2"><?php echo $num; ?></h1>
                                                <h4 Patient class="text-white my-0">Appointments</h4>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="patient.php"><i class="fa fa-procedures fa-3x my-3" style="color: white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-md-3 bg-danger mx-2 my-1" style="height: 130px;" id="br">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8" >
                                        <?php
                                                $res = $_SESSION['receptionist'];
                                                $doc = mysqli_query($connect,"SELECT * FROM doctor where hospital ='$res'");
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>