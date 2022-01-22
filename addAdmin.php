<?php
session_start();
include "includes/admin_check.php";
include "./includes/nav_admin.php"; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin DAta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="row justify-content-md-center">
    <div class="form group col-md-7 mt-4">
        <form action="prosesAdmin.php" method="post">
            <h2>Tambah Data Admin</h2>
            
                <div class="mb-3 mt-3">
                    <label for="nama">Admin Name</label>
                    <input type="text" class="form-control" id="nama" placeholder="masukkan nama admin" name="admin_name">
                </div>
                <div class="mb-3 mt-3">
                    <label for="nama">Username</label>
                    <input type="text" class="form-control" id="nama" placeholder="masukkan username" name="Username">
                </div>
                <div class="mb-3 mt-3">
                    <label for="nama">Password</label>
                    <input type="password" class="form-control" id="nama" placeholder="masukkan password" name="Password">
                </div>
                <div class="mb-3 mt-3">
                    <label for="nama">Email</label>
                    <input type="text" class="form-control" id="nama" placeholder="masukkan email" name="Email">
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</div>


</body>
</html>