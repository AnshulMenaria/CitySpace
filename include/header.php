<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Space</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
#h2{
    margin: 0px 0px 0px 700px;
}
#h3{
    margin: 0px 0px 0px 650px;
}
#nav{
    background-color: darkcyan;
   
}

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-info " id="nav">
        <h1 class="text-white">City Space</h1>           
         <ul class="navbar-nav" id="header1">
            <?php

                if(isset($_SESSION['admin'])) {
                   
                    $user = $_SESSION['admin'];
                    echo'
                    <li class="nav-item"><a href="profile.php" class="nav-link text-white" id="h2">'.$user.'</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link text-white" >Logout</a></li>
                    ';
                }

                
                else if(isset($_SESSION['receptionist'])) {
                    $user = $_SESSION['receptionist'];
                    echo'
            <li class="nav-item"><a href="profile.php" class="nav-link text-white" id="h3">'.$user.'</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link text-white" >Logout</a></li>
                    ';
                }
                

                else if(isset($_SESSION['doctor'])) {
                    $user = $_SESSION['doctor'];

                    echo'
            <li class="nav-item"><a href="profile.php" class="nav-link text-white" id="h3">'.$user.'</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link text-white" >Logout</a></li>
                    ';
                }

                
                else if(isset($_SESSION['user'])) {
                    $user = $_SESSION['user'];
                    include('connection.php');
                    $query = "SELECT * FROM user WHERE contact = '$user'";
                    $res = mysqli_query($connect,$query);
                    while ($row = mysqli_fetch_array($res)) {
                        $name = $row['name'];
                    }
                    echo'
            <li class="nav-item"><a href="profile.php" class="nav-link text-white" id="h3">'.$name.'</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>
                    ';
                } 


                else{
                    echo'
            <li class="nav-item"><a href="index.php" class="nav-link text-white" id="h2">Home</a></li>
            <li class="nav-item" id="a"><a href="Login/login.php" class="nav-link text-white" >Login</a></li>
                    ';
                }
                ?>
                </ul>
    </nav>
</body>
</html>