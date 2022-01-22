<?php
session_start();
if(isset($_COOKIE['typeAdmin'])){
    header("location:homeAdmin.php");
} else if(isset($_COOKIE['typeUser'])){
    header("location:homeStudent.php");
}
?>