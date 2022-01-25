<?php

include 'includes/conn.php';
$batas = 5;


if(isset($_GET['halaman'])){
  $halaman = $_GET['halaman'];
}else{
  $halaman = 1;
}

if($halaman=="" || $halaman==1)
{
  $halaman1 = 0;
}else{
  $halaman1 = ($halaman*$batas)-$batas;
}

  if (isset($_GET['search'])) {
        $keyword = $_GET['keyword'];

        $query = mysqli_query($conn, "SELECT * FROM students WHERE  nim LIKE '%$keyword%'");
    } else {
        $query = mysqli_query($conn,"SELECT * FROM students limit $halaman1, $batas");
    }


$data = mysqli_query($conn,"select * from students");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);
  //$query = mysqli_query($conn,"SELECT * FROM students limit $halaman1, $batas");
  $nomor = $halaman1+1;




  for($a=1; $a<= $total_halaman; $a++){
        
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

     <!-- Bootstrap icon -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Tampil Data</title>

    <style>
      .pesan{
        color:#3c763d !important;
        background:#9dfacb !important;
      }
        .tabel-container{
            background-color:#F9F9F9;
            overflow:auto;
        }
        .rata{
          vertical-align:middle;
        }
        img{
          width:70px;
          height:70px;
        }
        #small{
            width: 2%;;
        }
        #medium {
            width: 5%;;
        }
        #large {
            width: 15%;;
        }
        #large {
            width: 14%;;
        }
        .container{
          background:white;
            box-shadow:0px 0px 2px 2px #d6d6d6;
        }
        .custom{
          width: 80px !important;
        }

        
    </style>
  </head>
  <body>
  <?php include 'includes/nav_admin.php' ?>
    <div class="text-center m-5">
          <h3 >Daftar Students</h3>
    </div>
    
    <div class=" container col-md-12 col-centered mt-2 p-2 mb-5">
      
      <div class="col-md-12 mx-auto p-4 ">
          <div>
          <a class="btn btn-primary text-white mt-2" href="tambahstudent.php"><span class="bi bi-plus-square"> TAMBAH</span></a>
          </div>
          <div class="pesan m-3">
            <?php 
              if(isset($_GET['pesan'])){
                if($_GET['pesan']=="berhasil"){
                  echo '
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Berhasil Di Tambahkan</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }
              }else if(isset($_GET['editstudents'])){
                if($_GET['editstudents']=="berhasil"){
                  echo '
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Berhasil Di Edit</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }

              }else if(isset($_GET['hapus'])){
              if($_GET['hapus']=="berhasil"){
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil Di Hapus</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
              }

            }
          ?>
        </div>
		
		<form action="" method="get" class="d-flex">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Search NIM" autocomplete="off">
                <button class="btn btn-outline-primary" type="submit" name="search" value="search">Search</button>
            </form>
            <br>
      
        <div class="tabel-container mt-4">
              <table class="table table-striped col-centered mt-2">
                <thead class="table-dark">
              
                    <tr class="text-center">
                    <th scope="col" id="small">No</th>
                    <th scope="col"id="medium">Foto</th>
                    <th scope="col" id="medium">NIM</th>
                    <th scope="col" id="large">Nama</th>
                    <th scope="col" id="large">Jurusan</th>
                    <th scope="col" id="medium">No_Telp</th>
                    <th scope="col" id="large">Email</th>
                    <th scope="col" id="lg">ACTION</th>
                  </tr>
                </thead>
                <tbody>
 
                <?php 
               
                  while ( $row = mysqli_fetch_assoc($query)) {        	
                ?>
                    <tr class="rata">
                    <td><?=$nomor++;?></td>
                    <td ><img src="photo/<?=$row['foto'] ?> "></td>
                    <td ><?=$row['nim'] ?></td>
                    <td ><?=$row['nama'] ?></td>
                    <td ><?=$row['Jurusan'] ?></td>
                    <td ><?=$row['notelp'] ?></td>
                    <td ><?=$row['email'] ?></td>
                    
                    <td  class="text-center">
                      <a class="btn  " onclick="return confirm('Yakin mau menghapus data ini ?')" href="hapus.php?action=hapus&nim=<?= $row['nim'] ?>"><button class="btn btn-danger" type="button"><span class="bi bi-trash"> Hapus</span></button></a>                
                      <a class="btn" href="editstudents.php?nim=<?= $row['nim'] ?>"><Button class="btn btn-warning " type="button"><span class="bi bi-pencil-square"> Edit</span></Button></a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <?php
			  if(!isset($_GET['search'])){
            echo   '<ul id="paging" class="pagination justify-content-center mt-3">';
            //Previous Button
            if($halaman > 1){
                ?><li class="page-item"><a class="page-link" href="tampilstudent.php?page=<?php echo $halaman-1; ?>">Previous</a></li><?php
            }
            //Page Number Limit
            if($total_halaman> 5 && $halaman < 3){
                for($a=1; $a<= 5; $a++){
                    ?><li class="page-item <?php if ($halaman == $a) echo 'active'; ?>"><a class="page-link " href="tampilstudent.php?halaman=<?php echo $a; ?>"><?php echo $a ?></a></li><?php
                }
                ?><li class="page-item"><a class="page-link">...</a></li><?php
                ?><li class="page-item <?php if ($halaman == $a) echo 'active'; ?>"><a class="page-link " href="tampilstudent.php?halaman=<?php echo $total_halaman; ?>"><?php echo $total_halaman ?></a></li><?php
            }if($halaman >= 3 && $halaman+2 < $halaman){
                for($a=$halaman-2; $a<= $halaman+2; $a++){
                    ?><li class="page-item <?php if ($halaman == $a) echo 'active'; ?>"><a class="page-link " href="tampilstudent.php?halaman=<?php echo $a; ?>"><?php echo $a ?></a></li><?php
                }
                if($halaman + 2 < $total_halaman){
                    ?><li class="page-item"><a class="page-link">...</a></li><?php
                }
                ?><li class="page-item <?php if ($halaman == $a) echo 'active'; ?>"><a class="page-link " href="tampilstudent.php?halaman=<?php echo $total_halaman; ?>"><?php echo $total_halaman ?></a></li><?php
            }
            if($halaman+2 >= $total_halaman && $total_halaman > 5){
                for($a=$halaman-2; $a<= $total_halaman; $a++){
                    ?><li class="page-item <?php if ($halaman == $a) echo 'active'; ?>"><a class="page-link " href="tampilstudent.php?halaman=<?php echo $a; ?>"><?php echo $a ?></a></li><?php
                }
            }
            if($total_halaman <= 5){
                for($a=1; $a<= $total_halaman; $a++){
                    ?><li class="page-item <?php if ($halaman == $a) echo 'active'; ?>"><a class="page-link " href="tampilstudent.php?halaman=<?php echo $a; ?>"><?php echo $a ?></a></li><?php
                }
            }
            //Next Button
            if($halaman < $total_halaman){
                ?><li class="page-item"><a class="page-link" href="tampilstudent.php?halaman=<?php echo $halaman+1; ?>">Next</a></li><?php
            }
            echo '</ul>';
			  }
        ?>
         </div>
                                    
      </div>
              
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   
  </body>
</html>
