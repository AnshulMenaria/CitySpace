<?php
session_start();
?>

<!DOCTYPE html> 
    <html>
<head>
    <title>User Dashboard</title>
    <style>
        #br{
            border-radius:10px;
            width: 35%;
        }
    </style>
</head>
<body style="background-image:url(../img/User-Dash-bg.jpg); background-repeat:no-repeat; background-size:cover;">
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
                    <h4 class="my-2" style="color: darkslategray;">User Dashbord</h4>
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3 my-2 bg-success" style="height: 150px;" id="br">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
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
                                            
                                                <h1 class="text-white my-2">0</h1>
                                                <h1 Patient class="text-white my-2">Documents</h1>
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