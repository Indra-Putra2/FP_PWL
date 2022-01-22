<?php
    session_start();
    include 'includes/conn.php';
    include "includes/nav_admin.php";
    include "includes/admin_check.php";

    $result = mysqli_query($conn, "SELECT * FROM news ORDER BY newsId") or die(mysqli_error($conn));
    while ($data = mysqli_fetch_array($result)) {
    $rows[] = $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Home Admin</title>
</head>
<body>
    <div class="container mt-5">
        <h1 style="color:purple; text-align:center">Selamat Datang, 
        <?php 
        if(isset($_COOKIE['typeAdmin'])){
            echo $_COOKIE['typeAdmin'];}
        if(isset($_SESSION['nameAdmin'])){
            echo $_SESSION['nameAdmin'];}
        ?></h1>
       
        <div class="container mx-auto py-5">
    <div class="card">
        <div class="card-header" style="text-align: center;">
            <h3>Daftar Info dan Pengumuman</h3>
        </div>
        <div class="card-body">
        <table class="table table-bordered">
    
  <thead class="table-dark">
    <tr>
      <th scope="col" width="5%">NewsId</th>
      <th scope="col" width="20%">Tanggal Publikasi</th>
      <th scope="col" width="60%">Info dan Pengumuman</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
  
    <?php foreach ($rows as $row) : ?>
            <tr>
                <td><?= $row['newsId'] ?></td>
                <td><?= $row['date'] ?></td>
                <td><?= $row['announcement'] ?></td>
                <td>
                    <a href="homeAdmin_editForm.php?newsId=<?= $row['newsId']?>" class="btn btn-warning">Edit</a>
                    <a href="includes/homeAdmin_newsProcess.php?action=delete&newsId=<?= $row['newsId']?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin untuk menghapus pengumuman ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
  </tbody>
</table>
        </div>
    </div>
</div>

    <div class="container mx-auto py-5">
        <div class="card">
        <div class="card-header" style="text-align: center;">
            <h4>Membuat Info dan Pengumuman Baru</h4>
        </div>
        <div class="card-body">
            <form action="includes/homeAdmin_newsProcess.php" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Pengumuman Baru</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="announcement"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
        </div>
        
    </div>

        
    </div>
</body>
</html>