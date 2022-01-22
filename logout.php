<?php
session_start();

$_SESSION['usernameAdmin']='';
$_SESSION['nameAdmin']='';
$_SESSION['usernameUser']='';
$_SESSION['nameUser']='';

unset($_SESSION['usernameAdmin']);
unset($_SESSION['nameAdmin']);
unset($_SESSION['usernameUser']);
unset($_SESSION['nameUser']);

session_unset();
session_destroy();

if(isset($_COOKIE['typeAdmin'])){
    setcookie("typeAdmin", "", time()-3600);
}

if(isset($_COOKIE['typeUser'])){
    setcookie("typeUser", "", time()-3600);
}

header("location:index.php");
?>