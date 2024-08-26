<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document's</title>
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
        input[type=file]{
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
                    $user = $_SESSION['user'];

                $query = "SELECT * FROM document WHERE contact = '$user'";

                $res= mysqli_query($connect,$query);

                while ($row = mysqli_fetch_array($res)) {

                $name = $row['name'];
                $doc = $row['document'];
                }
                ?>
            </div>  
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center">Document's</h5> 

                            <?php 
                                $user = $_SESSION['user'];
                                $query = "SELECT * FROM document WHERE contact = '$user'";
                                $res = mysqli_query($connect,$query);

                                $output = "
                                <table class='table table-bordered'>
                                <tr>
                                <th id='table' style='width: 10%;'>Sno.</th>
                                <th id='table'>Name</th>
                               
                                <th style='width: 42%;' id='table'>Action</th>
                                </tr>
                                ";

                                if (mysqli_num_rows($res) < 1 ) {
                                    $output .= "<tr><td class='text-center' colspan='6' id='table'>------Empty------</td></tr>";
                                }

                                while ($row = mysqli_fetch_array($res)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $doc = $row['document'];                                                    
                                    $output .="
                                    <tr>
                                    <td id='table'>$id</td>
                                    <td id='table'>$name</td>
                                    <td id='table' style='width: 20%;'><a href='?document=img/$doc' download><button name='$doc' class='btn btn-success'>Download</button>
                                        <a href='?id=$id'><button name='$id' class='btn btn-danger remove'>Remove</button></a>
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

                                    $query = "DELETE FROM document WHERE id = '$id'";
                                    mysqli_query($connect,$query); 
                                    header("location:documents.php"); 
                                }
                            ?>
                
                        </div>
                        <div class="col-md-8">
                            <?php

                                if (isset($_POST['add'])) {

                                    $name = $_POST['name'];
                                    $doc = $_FILES['doc']['name'];                           

                                    $error = array();

                                    if (empty($name)) {
                                        $error['u'] = "Enter Patient Name";
                                    }else if(empty($doc)){
                                        $error['u'] = "Select Document";
                                    }
                                    include("../include/connection.php");
                                    $s = "select id from document order by id desc";
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
                                        $user = $_SESSION['user'];
                                        $q = "INSERT INTO document(id,name,document,contact) VALUES('$id','$name','$doc','$user')";
                                        $result = mysqli_query($connect,$q);
                                    
                                    if ($result) {
                                    move_uploaded_file($_FILES['doc']['tmp_name'], "img/$doc");
                                            }
                                    }
                                        header("location:documents.php");


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
                                    <label>Document</label>
                                    <input type="file" name="doc" class="form-control">
                                </div>
                                
                                <br>
                                <input type="submit" value="Add Document" name="add" class="btn btn-success">
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