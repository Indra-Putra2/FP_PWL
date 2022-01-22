<?php
session_start();
include 'includes/conn.php';

if(isset($_POST['login'])){
$username = $_POST['username-nim'];
$password = md5($_POST['password']);

$sql = ("SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1");
$result = mysqli_query($conn, $sql);
$total = mysqli_num_rows($result);

    if($total > 0){
        $row = mysqli_fetch_array($result);
        $_SESSION['usernameAdmin'] = $row['username'];
        $_SESSION['nameAdmin'] = $row['adminName'];
        if(isset($_POST['remember-me'])){
            $_SESSION['nameAdmin'] = '';
            $typeAdmin = $row['adminName'];
            $nameAdmin = $username;
            setcookie('typeAdmin', $typeAdmin, time()+3600);
            setcookie('nameAdmin', $nameAdmin, time()+3600);
        }
        header("location:homeAdmin.php");
      } else {
        
        $sql2 = ("SELECT * FROM students WHERE nim='$username' AND password='$password'");
        $result2 = mysqli_query($conn, $sql2);
        $total2 = mysqli_num_rows($result2);
        $row = mysqli_fetch_array($result2);
        $_SESSION['usernameUser'] = $row['nim'];
        $_SESSION['nameUser'] = $row['nama'];
        
        if($total2 > 0){
          if(isset($_POST['remember-me'])){
            $_SESSION['nameUser'] = '';
            $typeUser = $row['nama'];
            $nameUser = $username;
            setcookie('typeUser', $typeUser, time()+3600);
            setcookie('nameUser', $nameUser, time()+3600);
          }
          header("location:homeStudent.php");
        }
        else { 
          echo "<script>alert('Username atau password salah');location='login.php';</script>";
        }
    }     
} 


?>