<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style> 
        .main{
            border: 2px;
            border-radius: 20px;
            background-color: ;
            width: 99%;
            height: 80vh;
            margin: 50px 0px 0px 10px;
        }
        img{
            height: 240px;
            width: 280px;
            border: none;
            border-radius: 300px;
            position: relative;
            top: 70px;
            left: 20px;
            padding: 20px;
            cursor: pointer;
            transition: transform 0.8s ease;
        }
        img:hover{
            transform: scale(1.1);
            box-shadow: 0 2px 7px rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(5px);
        }
    </style>
</head>
<body style="background-image:url(../img/Login-Page.jpg); background-repeat:no-repeat; background-size:cover;">
    <div class="main">
        <div id="la">
            <table>
                <tr>
                    <td><a href="userlogin.php" style="text-decoration: none; color: white;"><img src="../img/User-Login.png" alt=""id="i1"></a></td>
                    <td><a href="doctorlogin.php" style="text-decoration: none; color: white;"><img src="../img/Doctor-Login.png" alt="" id="i2"></a></td>
                    <td><a href="adminlogin.php" style="text-decoration: none; color: white;"><img src="../img/Admin-Login.png" alt="" id="i3"></a></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>