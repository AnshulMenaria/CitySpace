<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
    <style>
        #table{
            background-color: #E4E8EF;
            border: 1px solid black;
        }
        
    </style>
    </style>
</head>
<body style="background-image:url(../img/Profile-page.png); background-repeat:no-repeat; background-size:cover;">
<?php
    include("../include/header.php");
?>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
        <div class="col-md-2" style="margin-left: -30px; height: 140vh;">
                <?php
                    include("sidenav.php");
                    include("../include/connection.php");
                ?>
            </div>
            <div class="col-md-10">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center">ALL PATIENT's</h5> 
                            <?php 
                                $doc = $_SESSION['doctor'];
                                $query = "SELECT * FROM patient WHERE doctor = '$doc'";
                                $res = mysqli_query($connect,$query);

                                $output = "
                                <table class='table table-bordered'>
                                <tr>
                                <th id='table'>Sno</th>
                                
                                <th id='table'>Name</th>
                                <th id='table'>Age</th>
                                <th id='table'>Gender</th>
                                <th id='table'>Contact</th>
                                <th id='table'>Date time</th>
                                
                                <th style='width: 10%;' id='table'>Action</th>
                                </tr>
                                ";

                                if (mysqli_num_rows($res) < 1 ) {
                                    $output .= "<tr><td class='text-center' id='table' colspan='6'>------Empty------</td></tr>";
                                }
                                $sno=0;

                                while ($row = mysqli_fetch_array($res)) {
                                    $name = $row['name'];
                                    $doc = $row['doctor'];
                                    $con = $row['contact'];
                                    $age = $row['age'];
                                    $gender = $row['gender'];
                                    $dt = $row['date_time'];
                                    
                                                   $sno++;                     
                                    $output .="
                                    <tr>
                                    <td id='table'>$sno</td>
                                
                                    <td id='table'>$name</td>
                                
                                    <td id='table'>$age</td>
                                    <td id='table'>$gender</td>
                                    <td id='table'>$con</td>
                                    <td id='table'>$dt</td>
                                                                   
                                    <td id='table'>
                                        <a href='?name=$name'><button name='$name' class='btn btn-danger remove'>Remove</button></a>
                                    </td>
                                    ";
                                }

                                $output .="
                                </tr>
                                </table>
                                ";

                                echo $output;

                                if (isset($_GET['name'])) {
                                    $name= $_GET['name'];

                                    $query = "DELETE FROM patient WHERE name= '$name'";
                                    mysqli_query($connect,$query); 
                                    header("location:patient.php"); 
                                }
                            ?>
                
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
