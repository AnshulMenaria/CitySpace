<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor</title>
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
        #select{
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
<div class="container-fluid" style="background-image:url(../img/Add-Rem.jpg); background-repeat:no-repeat; background-size:cover;">
    <div class="col-md-12">
        <div class="row">
        <div class="col-md-2" style="margin-left: -30px; height: 170vh;">
                <?php
                    include("sidenav.php");
                    include("../include/connection.php");
                ?>
            </div>
            <div class="col-md-8">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="text-center">ALL DOCTOR's</h5> 

                            <?php 
                                $doc = $_SESSION['admin'];
                                $query = "SELECT * FROM doctor WHERE username !='$doc'";
                                $res = mysqli_query($connect,$query);


                                $output = "
                                <table class='table table-bordered'>
                                <tr>
                                <th id='table'>ID</th>
                                <th id='table'>Username</th>
                                <th id='table'>Contact</th>
                                <th id='table'>Email</th>
                                <th id='table'>Qualification</th>
                                <th id='table'>Department</th>
                                <th id='table'>Hospital</th>
                                
                                <th style='width: 10%;' id='table'>Action</th>
                                </tr>
                                ";

                                if (mysqli_num_rows($res) < 1 ) {
                                    $output .= "<tr><td class='text-center' id='table' colspan='6'>No New Doctor</td></tr>";
                                }

                                while ($row = mysqli_fetch_array($res)) {
                                    $id = $row['id'];
                                    $username = $row['username'];
                                    $contact = $row['contact'];
                                    $email = $row['email'];
                                    $qualification = $row['qualification'];
                                    $department = $row['department'];
                                    $hospital = $row['hospital'];
                                    

                                    $output .="
                                    <tr>
                                    <td id='table'>$id</td>
                                    <td id='table'>$username</td>
                                    <td id='table'>$contact</td>
                                    <td id='table'>$email</td>
                                    <td id='table'>$qualification</td>                                    
                                    <td id='table'>$department</td>                                    
                                    <td id='table'>$hospital</td>                                    
                                    <td id='table'>
                                        <a href='?id=$id'><button id='$id' class='btn btn-danger remove'>Remove</button></a>
                                    </td>
                                    ";
                                }

                                $output .="
                                </tr>
                                </table>
                                ";

                                echo $output;

                                if (isset($_GET['id'])) {
                                    $id= $_GET['id'];

                                    $query = "DELETE FROM doctor WHERE  id= '$id'";
                                    mysqli_query($connect,$query);
                                    header("location:doctors.php");

                                      
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>