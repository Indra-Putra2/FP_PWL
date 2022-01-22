<?php

session_start();
if(isset($_COOKIE['typeAdmin'])) {
    header("location:homeAdmin.php");
}

if(isset($_COOKIE['typeUser'])) {
    header("location:homeStudent.php");
}

require 'includes/snippet.php';
require 'includes/db-news-access.php';
include "includes/nav_index.php";

  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!--Flickity - untuk auto-play gambar-->
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
	<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
	<!--Bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>Perpustakaan Amikom</title>
</head>

<body>
	<div class="container-fluid slide">
		 <div width=100% class="carousel" data-flickity='{ "autoPlay": true }'>
			<div class="carousel-cell">
				<img width=100% height=100% src="images/library1.jpg">
			</div>
			<div class="carousel-cell">
				<img width=100% height=100% src="images/library2.jfif">
			</div>
			<div class="carousel-cell">
				<img width=100% height=100% src="images/library3.jfif">
			</div>
			</div>
	</div>

<br>
<br>

	<div class="container">
		<h1 style="text-align:center; color:purple;">
			Selamat Datang di Perpustakaan Amikom
		</h1>
	</div>

<br>

	<div class="container slide2">
	<div class="panel-heading">
	  	<div class="row">
	  		<h3 style="font-size: 30px; text-align:center">Info dan Pengumuman</h3>
		</div>
	</div>
	<table class="table table-bordered" style="font-size: 18px;">
    <thead>
        <tr style="text-align: center;">
            <th width="10%">Tanggal Publikasi</th>
            <th>Pengumuman</th>
    	</tr>
    </thead>

<?php 

$sql2 = "SELECT * from news";

$query2 = mysqli_query($conn, $sql2);
$counter = 1;
while ($row = mysqli_fetch_array($query2)) {  ?>
    <tbody>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['announcement']; ?></td>
    </tbody>

     <?php }
           ?>
		        
    </tbody> 
</table>
		 
</div>
</div>
</div>
		
	<footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3"></ul>
    <p class="text-center text-muted">&copy; 2021 Universitas Amikom Yogyakarta</p>
  </footer>
</body>
</html>