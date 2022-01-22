<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
<?php
session_start();
include "includes/admin_check.php";

include "./includes/conn.php";
include "./includes/nav_admin.php";
$username = $_GET['username'];
$result = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'"); 


while($data = mysqli_fetch_array($result)){
?>

<div class="row justify-content-md-center">
    <div class="form group col-md-7 mt-4">
        <form action="prosesAdmin.php" method="post">
            <h2>Edit Data Admin</h2>
            
                <div class="mb-3">
                    <label for="nama">Username</label>
                    <input type="text" class="form-control" id="nama" placeholder="masukkan username akun" name="Username" value="<?= $data['username'] ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="nama">Admin Name</label>
                    <input type="text" class="form-control" id="nama" placeholder="masukkan nama admin" name="admin_name" value="<?= $data['adminName'] ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="nama">Password</label>
                    <input type="text" class="form-control" id="nama" placeholder="masukkan password akun" name="Password"  required>
                </div>
                <div class="mb-3">
                    <label for="nama">Email</label>
                    <input type="email" class="form-control" id="nama" placeholder="masukkan nama email" name="Email" value="<?= $data['email'] ?>"required>
                </div>
               
                <br>
                <button type="submit" class="btn btn-primary" name="edit">Edit</button>
        </form>
    </div>
</div>
<?php 
   }
?>








</body>
</html>