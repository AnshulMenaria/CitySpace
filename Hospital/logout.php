<?php
session_start();
    if(isset($_SESSION['receptionist'])) {
       unset($_SESSION['receptionist']);

    header("Location:../index.php");
    }
?>