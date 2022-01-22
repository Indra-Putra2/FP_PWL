<?php
session_start();
include "includes/admin_check.php";
include "includes/conn.php";
include "includes/nav_admin.php";




    if (isset($_SESSION['usernameAdmin'])) {
        $usad1 = $_SESSION['usernameAdmin'];
        
        $result = mysqli_query($conn, "SELECT * FROM admin WHERE username='$usad1'") or die(mysqli_error($conn));

        $rows = [];
        while($data = mysqli_fetch_array($result)){
            $rows[] = $data;
        }

    } elseif ($_COOKIE['typeAdmin'] == true){
        $usad2 = $_COOKIE['nameAdmin'];

        $result = mysqli_query($conn, "SELECT * FROM admin WHERE username='$usad2'") or die(mysqli_error($conn));

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Admin Page</title>
  </head>
  <body>

  <div class="row justify-content-md-center mt-5"> 
        <div class="card col-md-8 mb-1">
            <div class="card-header">
            <a href="addAdmin.php"><button class="btn btn-success col-lg-2 col-md-3 col-sm-10 col-xs-10 button" style="margin-left: 15px;margin-bottom: 5px"><span class="glyphicon glyphicon-plus-sign"><i class="bi bi-person-plus"></i></span> Tambah Data</button></a>
            </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr class="table-dark">
                                <th scope="col">Username</th>
                                <th scope="col">Admin Name</th>   
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                                

                                <?php foreach ($rows as $row) : ?>
                                    <tr class="table-active">
                                        <td><?= $row['username'] ?></td>
                                        <td><?= $row['adminName'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td>
                                            <a class="btn" href="editAdmin.php?username=<?= $row['username'] ?>" ><Button class="btn btn-warning" type="button"><span class="bi bi-pencil-square"> Edit</span></Button></a>
                                            <a class="btn" onclick="return confirm('Yakin mau hapus data ini?')" href="proses.php?action=hapus&username=<?= $row['username'] ?>"> <button class="btn btn-danger" type="button"><span class="bi bi-trash"> Hapus</span></button></a>
                                    
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tr>
                        </tbody>
                    </table> 
                </div>
        </div>
    </div>
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
    -->
  </body>
</html>

