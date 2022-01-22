<?php 
session_start();
include "includes/admin_check.php";
include "./includes/conn.php";
if (isset($_POST['tambah_buku'])) {

    $result = mysqli_query($conn, "SELECT * FROM books ORDER BY bookId") or die(mysqli_error($conn));
    $jumlah = mysqli_num_rows($result);


    $id = $_POST['id'];
    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $author = mysqli_real_escape_string($conn,$_POST['author']);
    $sinopsis = mysqli_real_escape_string($conn,$_POST['sinopsis']);
    $page = $_POST['page'];
    $isbn = $_POST['isbn'];
    $copies = $_POST['copies'];
    $publisher = mysqli_real_escape_string($conn,$_POST['publisher']);
    $publication = $_POST['publication'];
    $available = $_POST['available'];
    $categories = mysqli_real_escape_string($conn,$_POST['categories']);
    $folder='./cover/';
        $nama_foto=$_FILES['foto']['name'];
        $ambil = $nama_foto;
        $tipe_file = pathinfo($ambil, PATHINFO_EXTENSION);
        $cover=date('Y-M-D H-i-s-').$id.'.'.$tipe_file;
        $sumber=$_FILES['foto']['tmp_name'];
        $limit = 1 * 1024 * 1024;
        $ekstensi =  array('png','jpg','jpeg');
        $ukuran = $_FILES['foto']['size'];

        if($ukuran > $limit){
            echo"<script>alert('Maaf ,Ukuran Tidak Sesuai!');window.history.go(-1);</script>";			
        }else{
            if(!in_array($tipe_file, $ekstensi)){
                echo"<script>alert('Maaf ,Ekstensi Salah!');window.history.go(-1);</script>";		
            }else{		
                move_uploaded_file($sumber,$folder.$cover);

                $sql= "INSERT INTO books VALUES ('$id','$cover','$title','$author','$sinopsis','$page','$isbn','$copies','$publisher','$publication','$available','$categories');";
                $query=mysqli_query($conn,$sql);
                if ($query) {
                    $tambah = 1;
                    header("Location:books.php?tambah=".$tambah);
                }
                else {
                echo "<script>alert('Error');window.history.go(-1);</script>";
                }
            }
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
<?php include 'includes/nav_admin.php' ?>
<div class="row justify-content-center mt-2">
    <div class="col-sm-8">
        <div class="container p-5 mt-1">
            <div class="card card-body bg-light ">
            <div class="textcenter">
                <h1><center>TAMBAH DATA BUKU</center></h1><br>
            </div>
                <form action="tambah_buku.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">ID Buku</label><br>
                        <?php 
                            $result = mysqli_query($conn, "SELECT bookId FROM books ORDER BY bookId DESC LIMIT 1") or die(mysqli_error($conn));
                            $result_id =mysqli_fetch_assoc($result);
                        ?>
                        <input type="number" class="form-control" value=<?php if($result_id!=null){echo $result_id['bookId']+1;}else{echo 1;} ?> name="id" readonly>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Cover Buku</label>
                        <input type="file" class="form-control" name="foto" required>  
                        <p>Hanya bisa ekstensi .png, .jpg, .jpeg dan size maksimal 2 MB</p>    
                    </div> 

                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label><br>
                        <input type="text" class="form-control" name="title">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pengarang</label>
                        <select class="form-control" name="author" onmousedown="if(this.options.length>5){this.size=5;}"  onchange='this.size=0;' onblur="this.size=0;">
                        <?php 
                            $conn = mysqli_connect("localhost","root","","library_db");
                            $result = mysqli_query($conn, "SELECT * FROM authors") or die(mysqli_error($conn));
                            while($rows = mysqli_fetch_array($result)) 
                            {  
                        ?>
                            <option value="<?php echo $rows['author'] ?>" required><?php echo $rows['author'] ?></option>
                        <?php
                            };
                        ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sinopsis</label><br>
                        <textarea name="sinopsis" class="form-control" cols="200" rows="15" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Halaman</label><br>
                        <input type="number" class="form-control" name="page" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ISBN</label><br>
                        <input type="text" class="form-control" name="isbn" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Banyak Buku</label><br>
                        <input type="number" class="form-control" name="copies" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Penerbit</label>
                            <select class="form-control" name="publisher" onmousedown="if(this.options.length>5){this.size=5;}"  onchange='this.size=0;' onblur="this.size=0;">
                            <?php 
                                $conn = mysqli_connect("localhost","root","","library_db");
                                $result = mysqli_query($conn, "SELECT * FROM publisher") or die(mysqli_error($conn));
                                while($rows = mysqli_fetch_array($result)) 
                                {  
                            ?>
                                <option value="<?php echo $rows['publisherName'] ?>" required><?php echo $rows['publisherName'] ?></option>
                            <?php
                                };
                            ?>
                            </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Publikasi</label><br>
                        <input type="date" class="form-control" name="publication" required>
                    </div>
                        <label class="form-label">Tersedia: </label>
                        <input type="radio" name="available" value="YES" required>
                        <label>YES</label>
                        <input type="radio" name="available" value="NO" required>
                        <label>NO</label><br>

                    <div class="mb-3">
                        <label class="form-label">Kategori</label><br>
                        <select class="form-control" name="categories" onmousedown="if(this.options.length>5){this.size=5;}"  onchange='this.size=0;' onblur="this.size=0;">
                            <?php 
                                $conn = mysqli_connect("localhost","root","","library_db");
                                $result = mysqli_query($conn, "SELECT * FROM category") or die(mysqli_error($conn));
                                while($rows = mysqli_fetch_array($result)) 
                                {  
                            ?>
                                <option value="<?php echo $rows['categories'] ?>" required><?php echo $rows['categories'] ?></option>
                            <?php
                                };
                            ?>
                            </select>
                    </div>
                    <button class="btn btn-success" type="submit" name="tambah_buku"><span class="bi bi-plus-square"> Tambah</span></button>
                    <a class="btn btn-primary" href="books.php">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>