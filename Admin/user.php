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
</head>
<body style="background-image:url(../img/Add-Rem.jpg); background-repeat:no-repeat; background-size:cover;">
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
                <div class="col-md-14">
                    <div class="row">
                        <div class="col-md-16">
                            <h5 class="text-center">ALL USER's</h5> 

                            <?php 
                                $rec = $_SESSION['admin'];
                                $query = "SELECT * FROM user";
                                $res = mysqli_query($connect,$query);

                                $output = "
                                <table class='table table-bordered'>
                                <tr>
                                <th id='table'>ID</th>
                                <th id='table'>Name</th>
                                <th id='table'>Contact</th>
                                <th id='table'>Email</th>
                                <th id='table'>Age</th>
                                <th id='table'>Gender</th>
                                <th id='table'>City</th>
                                <th id='table'>Password</th>
                                <th style='width: 10%;' id='table'>Action</th>
                                </tr>
                                ";

                                if (mysqli_num_rows($res) < 1 ) {
                                    $output .= "<tr><td class='text-center' colspan='6'>------Empty------</td></tr>";
                                }

                                while ($row = mysqli_fetch_array($res)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $con = $row['contact'];
                                    $em = $row['email'];
                                    $age = $row['age'];
                                    $gender = $row['gender'];
                                    $city = $row['city'];
                                    $pass = $row['password'];
                                                                        
                                    $output .="
                                    <tr>
                                    <td id='table'>$id</td>
                                    <td id='table'>$name</td>
                                    <td id='table'>$con</td>
                                    <td id='table'>$em</td>
                                    <td id='table'>$age year's</td>
                                    <td id='table'>$gender</td>
                                    <td id='table'>$city</td>
                                    <td id='table'>$pass</td>                                
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

                                if (isset($_GET['id'])) {
                                    $name= $_GET['id'];

                                    $query = "DELETE FROM user WHERE name = '$id'";
                                    mysqli_query($connect,$query); 
                                    header("location:user.php");
                                    
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