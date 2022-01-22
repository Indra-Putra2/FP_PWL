<?php

session_start();
include "includes/admin_check.php";
include "./includes/conn.php";
       if(isset($_POST['tambah'])){

        $nim = $_POST['nim'];
        $nama=$_POST['nama'];
        $password = md5($_POST['password']);
        $passwordconfirm = md5($_POST['passwordconfirm']);
        $email = $_POST['email'];
        $jurusan = $_POST['Jurusan'];
        $jumlahBuku = $_POST['jumlahBuku'];
        $notelp=$_POST['notelp'];
        $folder='./photo/';
            $nama_foto=$_FILES['foto']['name'];
            $rename=date('Hs').$nama_foto;
            $sumber=$_FILES['foto']['tmp_name'];
            $limit = 1 * 1024 * 1024;
            $ekstensi =  array('png','jpg','jpeg');
            $tipe_file = pathinfo($rename, PATHINFO_EXTENSION);
            $ukuran = $_FILES['foto']['size'];

            if($ukuran > $limit){
              echo"<script>alert('Maaf ,Ukuran Tidak Sesuai!');window.history.go(-1);</script>";			
            }else{
              if(!in_array($tipe_file, $ekstensi)){
                echo"<script>alert('Maaf ,Ekstensi Salah!');window.history.go(-1);</script>";			
              }else{		
                move_uploaded_file($sumber,$folder.$rename);

               
                if ($password == $passwordconfirm) {
                        $sql="INSERT INTO students VALUES('$nim','$nama','$password','$email','$jurusan','$jumlahBuku','$rename','$notelp')";
                        $query=mysqli_query($conn,$sql);
                        if ($query) {
                          header("location:tampilstudent.php?pesan=berhasil");
                        }
                          else {
                          echo "<script>alert('Error');window.history.go(-1);</script>";
                        }

                      }else{
                        echo"<script>alert('Maaf ,Password tidak sama!');window.history.go(-1);</script>";
                      }
                 }
             }

    
       }
	   
			 $sql=mysqli_query($conn,"SELECT *From jurusan");

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <title>Tambah Student</title>
    <style>
        .alert{
        color:#a3152b !important;
        background:#f08697 !important;
      }
       .card{
          background:white;
            box-shadow:0px 0px 2px 2px #d6d6d6;
        }
    </style>
  </head>
  <body>
  <?php include 'includes/nav_admin.php' ?>

      <div class="container d-flex justify-content-center col-md-5 ">
        <div class="card my-5 col-12">
          <div class="card-body mt-3 mx-5">
            <div class="mb-3 d-flex justify-content-center ">
                <h3>TAMBAH DATA</h3>
                </div>
                <div class="pesan col-lg-11 mt-3">
                 
                </div>
      
                <form action="" role="form" method="post" enctype="multipart/form-data">
                      <div class="form-group mb-3 col-lg-11">
                          <label class="form-label">NIM</label>
                          <input type="text" class="form-control"name="nim" placeholder="nim"required>
                      </div>
                      <div class="form-group mb-3 col-lg-11">
                          <label class="form-label">Nama Lengkap</label>
                          <input type="text" class="form-control"name="nama" placeholder="Nama Lengkap" required>
                      </div>
                      <div class="form-group mb-3 col-lg-11">
                          <label  class="form-label">Password</label>
                          <input type="password" class="form-control" name="password" placeholder="Isikan dengan 5  angka" pattern="[0-9]{5}" required>
                      </div>
                      <div class="form-group mb-3 col-lg-11">
                          <label  class="form-label">Konfirmasi Password</label>
                          <input type="password" class="form-control" name="passwordconfirm" placeholder="Konfirmasi password" pattern="[0-9]{5}" required>
                      </div> 
                     
                      <div class="form-group mb-3 col-lg-11">
                          <label  class="form-label">Email</label>
                          <input type="email" class="form-control" name="email" placeholder="Email" required>
                      </div>

                      <div class="form-group mb-3 col-lg-11">
					  
                          <label class="form-label">Jurusan</label>
                          <select class="form-select" id="exampleFormControlSelect1" name="Jurusan">
                          <?php
                            while ($data=mysqli_fetch_array($sql)){
                            ?>
                              <option value="<?=$data['Jurusan']?>"><?=$data['Jurusan']?></option>
                                          <?php
                              }
                              ?>
                          </select>
                      </div>

                      <input type="hidden" class="form-control" name="jumlahBuku" placeholder="buku" value="null" required>
                                              
                      <div class="form-group  mt-3 col-lg-11">
                          <label class="form-label">FOTO</label>
                              <input type="file" class="form-control" name="foto"  required>  
                              <p>Hanya bisa ekstensi .png, .jpg, .jpeg dan size maksimal 1 MB</p>    
                      </div> 
                      <div class="form-group my-3 col-lg-11">
                          <label class="form-label">No Telpon</label>
                          <input type="text" class="form-control"name="notelp" placeholder="No telepon" pattern="[0-9]{10,13}" required>
                      </div>
                      </div>
                      <div class="d-flex justify-content-center mb-3">
                      <button type="submit" class="btn text-white bg-primary" name="tambah">Tambah</button>
                      </div>                    
                </form> 
        </div>
      </div>
      
  </body>
</html>