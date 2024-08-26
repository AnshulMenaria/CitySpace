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
                             include("../include/connection.php");
                                $rec = $_SESSION['receptionist'];
                                $query = "SELECT name FROM receptionist WHERE username = '$rec'";
                                $res = mysqli_query($connect, $query);
                                while ($row = mysqli_fetch_array($res)) {
                                    $name = $row['name'];
                                }
                                $query = "SELECT * FROM doctor WHERE hospital ='$name'";
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
                                
                                
                                <th style='width: 10%;' id='table'>Action</th>
                                </tr>
                                ";

                                if (mysqli_num_rows($res) < 1 ) {
                                    $output .= "<tr><td class='text-center' id='table' colspan='7'>No New Doctor</td></tr>";
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
                        <div class="col-md-8">
                            <?php
                           

                                if (isset($_POST['add'])) {

                                    $uname = $_POST['uname'];
                                    $pass = $_POST['pass'];
                                    $con = $_POST['con'];
                                    $em = $_POST['em'];
                                    $qn = $_POST['qn'];
                                    $dp = $_POST['dp'];
                                   
                                   
                                    $image = $_FILES['img']['name'];

                                    $error = array();

                                    if (empty($uname)) {
                                        $error['u'] = "Enter Doctor Username";
                                    }else if(empty($pass)){
                                        $error['u'] = "Enter Doctor Password";
                                    }else if(empty($con)){
                                        $error['u'] = "Enter Doctor Contact";
                                    }else if(empty($em)){
                                        $error['u'] = "Enter Doctor Email";
                                    }else if(empty($qn)){
                                        $error['u'] = "Enter Doctor qualification";
                                    }else if(empty($image)){
                                        $error['u'] = "Enter Doctor Picture";
                                    }
                                    include("../include/connection.php");
                                    $s = "select id from doctor order by id desc";
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
                                    $rec = $_SESSION['receptionist'];
                                    $query = "SELECT name FROM receptionist WHERE username = '$rec'";
                                    $res = mysqli_query($connect,$query);
                                    while ($row = mysqli_fetch_array($res)) {
                                        $hname = $row['name'];
                                    }

                                    if (count($error) ==0) {

                                        $q = "INSERT INTO doctor(id,username,password,contact,email,qualification,department,hospital,profile) VALUES('$id','$uname','$pass','$con','$em','$qn','$dp','$hname','$image')";

                                        $result = mysqli_query($connect,$q);

                                        header("location:doctors.php");

                                        
                                        if ($result) {
                                            
                                            move_uploaded_file($_FILES['img']['tmp_name'], "img/$image");
                                        }else{

                                        }
                                    }
                                }
                                
                                if (isset($error['u'])){
                                $er = $error['u'];

                                $show = "<h5 class='text-center alert alert-danger'>$er</h5>";
                                }else{
                                    $show = "";
                                }
                            
                                
                            ?><br><br>
                            <h5 class="text-center">Add Doctor</h5>
                            <form method="post" enctype="multipart/form-data">
                                <div>
                                    <?php

                                    echo $show
                                    
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label >Username</label>
                                    <input type="text" name="uname" class="form-control" value="Dr." autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="pass" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" name="con" class="form-control">
                                </div>
                                <div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="mail" name="em" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Qualification</label>
                                    <input type="text" name="qn" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Department</label>
                                    <select name="dp" class="form-control" id="select">
                                        <option value="">---Select Department---</option>
                                        <option value="Physiology">Physiology</option>
                                        <option value="Cardiology">Cardiology</option>
                                        <option value="Neurology">Neurology</option>
                                        <option value="Orthopedics">Orthopedics</option>
                                        <option value="Oncology">Oncology</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Add Picture</label>
                                    <input type="file" name="img" class="form-control">
                                </div>
                            </div>
  
                                <br>
                                <input type="submit" value="Add New Doctor" name="add" class="btn btn-success">
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