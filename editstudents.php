<?php

session_start();
include "includes/admin_check.php";
include 'includes/conn.php';
if(isset($_POST['simpan'])){

    $nim = $_POST['nim'];
    $nama=$_POST['nama'];
    $password =md5($_POST['password']);
    $password2 = md5($_POST['password2']);
    $email = $_POST['email'];
    $jurusan = $_POST['Jurusan'];
    $notelp=$_POST['notelp'];
    $nama_foto=$_FILES['foto']['name'];
    
    

    if($nama_foto ==""){
    
        if($password!=""){
                if($password == $password2){
                    $edit = "UPDATE students 
                    SET nim='$nim', 
                    nama='$nama', 
                    password='$password',
                    email='$email',
                    Jurusan='$jurusan',
                    notelp='$notelp' WHERE nim='$nim'";
                    $query_edit = mysqli_query($conn, $edit);

                            if ($query_edit) {
                                
                                header("Location:tampilstudent.php?editstudents=berhasil");
                            } else {
                                echo "<script>alert('Error');window.history.go(-1);</script>";
                            }
                }else{
                    echo"<script>alert('Maaf ,Password tidak sama!');window.history.go(-1);</script>";
                }
            }else{
                $edit = "UPDATE students 
                SET nim='$nim', 
                nama='$nama',
                email='$email',
                Jurusan='$jurusan',
                notelp='$notelp' WHERE nim='$nim'";
                $query_edit = mysqli_query($conn, $edit);

                        if ($query_edit) {
                            
                            header("Location:tampilstudent.php?editstudents=berhasil");
                        } else {
                            echo "<script>alert('Error');window.history.go(-1);</script>";
                        }

            }



    }else{
        $folder='./photo/';
    // error_reporting (E_ALL ^(E_NOTICE |E_WARNING));
    
    $rename=date('Hs').$nama_foto;
    $sumber=$_FILES['foto']['tmp_name'];
    $limit = 1 * 1024 * 1024;
    $ekstensi =  array('png','jpg','jpeg');
    $tipe_file = pathinfo($rename, PATHINFO_EXTENSION);
    $ukuran = $_FILES['foto']['size'];
        if($ukuran > $limit){
            echo"<script>alert('Ukuran salah!');window.history.go(-1);</script>";			
            }else{
            if(!in_array($tipe_file, $ekstensi)){
                echo"<script>alert('Ekstensi salah!');window.history.go(-1);</script>";		
            }else{		
                move_uploaded_file($sumber,$folder.$rename);

           
               if($password!=""){
                    if($password == $password2){
                        $editt = "UPDATE students 
                        SET nim='$nim', 
                        nama='$nama', 
                        password='$password',
                        email='$email',
                        Jurusan='$jurusan',
                        foto='$rename',
                        notelp='$notelp' WHERE nim='$nim'";
                        $query_editt = mysqli_query($conn, $editt);
            
                            if ($query_editt) {
                                
                                header("Location:tampilstudent.php?editstudents=berhasil");
                            } else {
                                echo "<script>alert('Error');window.history.go(-1);</script>";
                            }
                    }else{
                        echo"<script>alert('Maaf ,Password tidak sama!');window.history.go(-1);</script>";
                    }
                }else{
                    $editt = "UPDATE students 
                        SET nim='$nim', 
                        nama='$nama', 
                        email='$email',
                        Jurusan='$jurusan',
                        foto='$rename',
                        notelp='$notelp' WHERE nim='$nim'";
                        $query_editt = mysqli_query($conn, $editt);
            
                            if ($query_editt) {
                                
                                header("Location:tampilstudent.php?editstudents=berhasil");
                            } else {
                                echo "<script>alert('Error');window.history.go(-1);</script>";
                            }
                }

                }
                
            }
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
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<!--    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

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
  
   
    <?php include 'includes/nav_admin.php' ;

error_reporting (E_ALL ^(E_NOTICE |E_WARNING));
$nim = $_GET['nim'];
$query = mysqli_query($conn, "SELECT * FROM students WHERE nim='$nim'");

while($data=mysqli_fetch_array($query)){
?>

      <div class="container d-flex justify-content-center col-md-5 ">
        <div class="card my-5 col-12">
          <div class="card-body mt-3 mx-5">
            <div class="mb-3 d-flex justify-content-center ">
                <h3>TAMBAH DATA</h3>
                </div>
               
      
                <form action="editstudents.php" role="form" method="post" enctype="multipart/form-data">
                      <div class="form-group mb-3 col-lg-11">
                          <label class="form-label">NIM</label>
                          <input type="text" class="form-control"name="nim"  value="<?= $data['nim'] ?>"readonly>
                      </div>
                      <div class="form-group mb-3 col-lg-11">
                          <label class="form-label">Nama Lengkap</label>
                          <input type="text" class="form-control"name="nama"  value="<?= $data['nama'] ?>" readonly>
                      </div>
                      <div class="form-group mb-4 col-lg-11">
                          <label class="form-label">Jurusan</label>
                          <input type="text" class="form-control" name="Jurusan"value="<?= $data['Jurusan'] ?>"readonly>
                      </div>                  

                      


                    

        <div>
            <label>Ganti Password : </label>
            <label><input type="radio" name="type" value="yes" />Yes</label>
            <label><input type="radio" name="type" value="no"checked />No</label>
        </div>
      
      <div class="yes select" id="yes" style="display:none;">
      <div class="form-group mb-3 col-lg-11">
                          <label  class="form-label">Password</label>
                          <input type="password" class="form-control" name="password" pattern="[0-9]{5}" placeholder="Isikan dengan 5  angka">
                          
                      </div>
                      <div class="form-group mb-3 col-lg-11">
                          <label  class="form-label">Password</label>
                          <input type="password" class="form-control" name="password2" pattern="[0-9]{5}" placeholder="Konfirmasi Password">
                          
                      </div>
      </div>
       
                      <div class="form-group mb-3 col-lg-11">
                          <label  class="form-label">Email</label>
                          <input type="email" class="form-control" name="email" value="<?= $data['email'] ?>" required>
                      </div>
                     
                      <div class="form-group  mt-3 col-lg-11">
                          <label class="form-label">FOTO</label>
                          <div>
                             <img class="mt-2" src="photo/<?php echo $data['foto']; ?>" style="width: 100px;float: left;margin-bottom: 5px;">
                              <input type="file" class="form-control" name="foto" >  
                              <p>Hanya bisa ekstensi .png, .jpg, .jpeg dan size maksimal 1 MB</p>  
                              </div>  
                      </div> 
                    
                      <div class="form-group my-3 col-lg-11">
                          <label class="form-label">No Telpon</label>
                          <input type="text" class="form-control"name="notelp" value="<?= $data['notelp'] ?>" pattern="[0-9]{10,13}"required >
                      </div>
                      </div>
                      <div class="d-flex justify-content-center mb-3">
                      <button type="submit" class="btn text-white bg-primary" name="simpan">SIMPAN</button>
                      </div>                    
                </form> 
        </div>
      </div>
      <?php
    }
?>

<script type="text/javascript">
        $('input[type="radio"]').click(function () {
          var inputValue = $(this).attr("value");
          if (inputValue == "no") {
            $("#yes").hide();
          } else {
            $("#yes").show();
            
          }
        });
      </script>

  </body>
</html>