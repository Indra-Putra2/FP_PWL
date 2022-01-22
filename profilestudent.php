<?php

session_start();
include "includes/user_check.php";
include 'includes/conn.php';
if (isset($_SESSION['usernameUser'])) {
    $user = $_SESSION['usernameUser'];

    $result = mysqli_query($conn, "SELECT * FROM students WHERE nim='$user'") or die(mysqli_error($conn));

        $rows = [];
        while($data = mysqli_fetch_array($result)){
            $rows[] = $data;
        }

    } elseif ($_COOKIE['typeUser'] == true){
        $usad2 = $_COOKIE['nameUser'];

        $result = mysqli_query($conn, "SELECT * FROM students WHERE nim='$usad2'") or die(mysqli_error($conn));

        $rows = [];
        while($data = mysqli_fetch_array($result)){
            $rows[] = $data;
        }

    }
    
      
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>View Profile</title>
    <style>
        .profile{
          justify-content: center;
        }
        img{
          width:160px;
          height:160px;
        }
       .card{
          background:white;
            box-shadow:0px 0px 2px 2px #d6d6d6;
        }
    </style>
  </head>
  <body>
    <?php include 'includes/nav_user.php' ?>

      <div class="container d-flex justify-content-center col-md-5 ">
        <div class="card my-5 col-12">
          <div class="card-body mt-3 mx-3">
                <div>
                <div class="col-lg-11 text-center  mb-3">
                    <h1>Profile</h1>
                </div>
                <?php foreach ($rows as $row) : ?>
                <div class="col-lg-11 text-center  mt-4">
                    <img src="photo/<?=$row['foto'] ?> ">
                </div >
                <div class="mx-5 profile">
                <div class="col-lg-11 mt-4">
                <p>NIM  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $row['nim'] ?></p>
                </div>
                <div class= "col-lg-11 mt-3">
                <p>Nama  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $row['nama'] ?></p>
                </div>
                <div class= "col-lg-11 mt-3 ">
                <p>Jurusan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $row['Jurusan'] ?></p>
                </div>
                <div class= "col-lg-11 mt-3 ">
                <p>Email  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $row['email'] ?></p>
                </div>
                <div class= "col-lg-11 mt-3 ">
                <p>No Telphone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $row['notelp'] ?></p>
                </div>
                <?php endforeach; ?>
                </div>
                </div>
        </div>
      </div>
    </div>
      
  </body>
</html>