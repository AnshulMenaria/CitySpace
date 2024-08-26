<?php
ob_start();
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospitals</title>
</head>
<body style="background-image:url(../img/Add-Rem.jpg); background-repeat:no-repeat; background-size:cover;">
<?php
    include("../include/header.php");
?>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -31px; height: 140vh;">
                <?php
                    include("sidenav.php");
                    include("../include/connection.php");
                ?>
            </div>
            <div class="col-md-10">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="text-center">ALL Hospital's</h5> 

                            <?php 
                                $rec = $_SESSION['admin'];
                                $query = "SELECT * FROM receptionist WHERE username !='$rec'";
                                $res = mysqli_query($connect,$query);

                                $output = "
                                <table class='table table-bordered'>
                                <tr>
                                <th>ID</th>
                                <th>Hospital Name</th>
                                <th>Username</th>
                                <th>Password</th>  
                                <th style='width: 10%;'>Action</th>
                                </tr>
                                ";

                                if (mysqli_num_rows($res) < 1 ) {
                                    $output .= "<tr><td class='text-center' colspan='4'>No Receptionist</td></tr>";
                                }    
                

                                while ($row = mysqli_fetch_array($res)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $username = $row['username'];
                                    $password = $row['password'];
                                    $image = $row['image'];
                                    $output .="
                                    <tr>
                                    <td>$id</td>
                                    <td>$name</td>
                                    <td>$username</td>
                                    <td>$password</td>
                                    <td>
                                    <a href='?username=$username'><button username='$username' class='btn btn-danger remove'>Remove</button></a>
                                    </td>
                                    ";
                                }

                                $output .="
                                </tr>
                                </table>
                                ";

                                echo $output;

                                if (isset($_GET['username'])) {
                                    $username= $_GET['username'];

                                    $query = "DELETE FROM receptionist WHERE  username= '$username'";
                                    mysqli_query($connect,$query);

                                    header("location:hospitals.php");
                                }
                        
                            ?>
                        </div>
                        <div class="col-md-6">
                            <?php

                                if (isset($_POST['add'])) {
                                    $name = $_POST['name'];                        
                                    $uname = $_POST['uname'];
                                    $pass = $_POST['pass'];
                                    $image = $_FILES['image']['name'];
                                    

                                    $error = array();

                                    if (empty($uname)) {
                                        $error['u'] = "Enter Receptionist Username";
                                    }else if(empty($name)){
                                        $error['u'] = "Enter Hospital Name";
                                    }else if(empty($pass)){
                                        $error['u'] = "Enter Receptionist Password";
                                    }else if(empty($image)){
                                        $error['u'] = "Select Hospital Image";
                                    }
                                    include("../include/connection.php");
                                    $s = "select id from receptionist order by id desc";
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
                                    if (count($error) ==0) {

                                        $q = "INSERT INTO receptionist(id,name,username,password,image) VALUES('$id','$name','$uname','$pass','$image')";

                                        $result = mysqli_query($connect,$q);
                                        
                                        if ($result) {
                                            header("location:hospitals.php");
                                            move_uploaded_file($_FILES['image']['tmp_name'], "img/$image");
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
                            
                                
                            ?>
                            <h5 class="text-center">Add Hospital</h5>
                            <form method="post" enctype="multipart/form-data">
                                <div>
                                    <?php

                                    echo $show
                                    
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label >Hospital</label>
                                    <input type="text" name="name" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label >Username</label>
                                    <input type="text" name="uname" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="pass" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <br>
                                <input type="submit" value="Add New Hospital" name="add" class="btn btn-success">
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