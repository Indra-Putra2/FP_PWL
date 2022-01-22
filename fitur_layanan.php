<?php 
session_start();
include "includes/user_check.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Fitur Layanan</title>
</head>
<?php include 'includes/nav_user.php' ?>
<body style="background-color: #9900ff" >
    <div id="Aktivitas" class="container rounded bg-light">
        <div class="text-justify mx-auto my-5 p-5">
            <h1 class="text-center mb-4">Pelayanan Perpustakaan</h1>
            <h3>Pelayanan Buku</h3>
            <p>
                1. Dapat dibawa pulang. <br>
                2. Maksimal meminjam buku 2. <br>
                3. Masa pinjaman paling lama 7 hari (1 minggu). <br>
                4. Merusak buku (merobek, menghilangkan halaman buku, menghilangkan buku) harus diganti buku yang baru dengan judul yang sama. <br> 
            </p>
            <h3>Tata Tertib Peminjaman Buku</h3>
            <p>
                1. Login. <br>
                2. Memilih buku yang akan dipinjam. <br>
                3. Mengisi formulir peminjaman. <br>
                4. Mengambil buku secara offline. <br>
            </p>
            <h3>Tata Tertib Pengambilan Buku</h3>
            <p>
                1. Berpakaian rapi dan sopan. <br>
                2. Menjaga ketenangan dan ketertiban. <br>
                3. Tidak merokok. <br>
                4. Setelah mengambil buku, pemgambil buku disilahkan untuk keluar ruangan. <br>
            </p>
        </div>
        
    </div>

</body>
</body>
</html>