<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient's</title>
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
        input[type=number]{
            background: #E4E8EF;
            border: 1px solid black;
            border-radius: 10px;
        }
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
            <div class="col-md-8">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-14">
                            <h5 class="text-center">ALL PATIENT's</h5> 

                            <?php 
                                $rec = $_SESSION['receptionist'];
                                $query = "SELECT * FROM patient WHERE hospital = '$rec'";
                                $res = mysqli_query($connect,$query);

                                $output = "
                                <table class='table table-bordered'>
                                <tr>
                                <th id='table'>Name</th>
                                <th id='table'>Doctor</th>
                                <th id='table'>Age</th>
                                <th id='table'>Gender</th>
                                <th id='table'>Contact</th>
                                <th style='width: 10%;' id='table'>Action</th>
                                </tr>
                                ";

                                if (mysqli_num_rows($res) < 1 ) {
                                    $output .= "<tr><td class='text-center' colspan='6' id='table'>------Empty------</td></tr>";
                                }

                                while ($row = mysqli_fetch_array($res)) {
                                    $name = $row['name'];
                                    $doc = $row['doctor'];
                                    $con = $row['contact'];
                                    $hos = $row['hospital'];
                                    $age = $row['age'];
                                    $gender = $row['gender'];
                                                                        
                                    $output .="
                                    <tr>
                                    <td id='table'>$name</td>
                                    <td id='table'>$doc</td>
                                    <td id='table'>$age year's</td>
                                    <td id='table'>$gender</td>
                                    <td id='table'>$con</td>                                
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

                                    $query = "DELETE FROM patient WHERE name = '$name'";
                                    mysqli_query($connect,$query); 
                                    header("location:patient.php"); 
                                }
                            ?>
                
                        </div>
                        <div class="col-md-8">
                            <?php
                            $rec = $_SESSION['receptionist'];
                            $res = mysqli_query($connect,$query);

                                if (isset($_POST['add'])) {

                                    $name = $_POST['name'];
                                    $doc = $_POST['doc'];
                                    $age = $_POST['age'];
                                    $gender = $_POST['gender'];                                    
                                    $con = $_POST['con'];
                                    

                                    $error = array();

                                    if (empty($name)) {
                                        $error['u'] = "Enter Patient Name";
                                    }else if(empty($doc)){
                                        $error['u'] = "Enter Doctor name they wants to visit";
                                    }else if(empty($age)){
                                        $error['u'] = "Enter Patient Age";
                                    }else if($gender == "") {
                                        $error['ac'] = "Select Gender";
                                    }else if(empty($con)){
                                        $error['u'] = "Enter Patient Contact";
                                    }

                                    if (count($error) ==0) {

                                        $q = "INSERT INTO patient(name,doctor,age,gender,contact,hospital) VALUES('$name','$doc','$age','$gender','$con','$rec')";
                                        $result = mysqli_query($connect,$q);
                                        header("location:patient.php");


                                    }
                                }
                                
                                if (isset($error['u'])){
                                $er = $error['u'];

                                $show = "<h5 class='text-center alert alert-danger'>$er</h5>";
                                }else{
                                    $show = "";
                                }
                            
                                
                            ?><br><br>
                            <h5 class="text-center">Add Patient</h5>
                            <form method="post" enctype="multipart/form-data">
                                <div>
                                    <?php

                                    echo $show
                                    
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label >Name</label>
                                    <input type="text" name="name" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Doctor</label>
                                    <input type="text" name="doc" value="Dr." class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="number" name="age" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" id="table" class="form-control">
                                        <option value="">--Select Your Gender--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" name="con" class="form-control">
                                </div>
                                
                                <br>
                                <input type="submit" value="Add Patient" name="add" class="btn btn-success">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>