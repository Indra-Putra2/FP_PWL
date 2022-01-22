<?php 
    session_start();
    include "includes/admin_check.php";
    include "./includes/conn.php";
    
    $result = mysqli_query($conn, "SELECT * FROM books ORDER BY bookId") or die(mysqli_error($conn));

    if (isset($_POST['edit_buku'])) {

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

        if($ukuran > $limit && !empty($_FILES['foto']['name'])){
            echo"<script>alert('Maaf ,Ukuran Tidak Sesuai!');window.history.go(-1);</script>";			
        }else{
            if(!in_array($tipe_file, $ekstensi) && !empty($_FILES['foto']['name'])){
                echo"<script>alert('Maaf ,Ekstensi Salah!');window.history.go(-1);</script>";		
            }else{		
                if(!empty($_FILES['foto']['name'])){
                    $hapus = mysqli_query($conn, "SELECT * FROM books WHERE bookId='$id'");
                    $rows = mysqli_fetch_array($hapus);
                    $contents = file_get_contents('./cover/'.$rows['picture']);
                    unlink('./cover/'.$rows['picture']);

                    move_uploaded_file($sumber,$folder.$cover);
                    $edit = "UPDATE books 
                    SET bookId='$id',
                    picture='$cover',
                    bookTitle='$title', 
                    author='$author',
                    sinopsis='$sinopsis',
                    page='$page',
                    ISBN='$isbn',
                    bookCopies='$copies',
                    publisherName='$publisher',
                    publication='$publication',
                    available='$available',
                    categories='$categories' WHERE bookId='$id'";
                    $query_edit = mysqli_query($conn, $edit);
            
                    if ($query_edit) {
                        $edit = 1;
                        mysqli_close($conn);
                        header("Location:books.php?edit=".$edit);
                    } else {
                        echo "<script>alert('Error');window.history.go(-1);</script>";
                    }
                }
                else{
                    $edit = "UPDATE books 
                    SET bookId='$id',
                    bookTitle='$title', 
                    author='$author',
                    sinopsis='$sinopsis',
                    page='$page',
                    ISBN='$isbn',
                    bookCopies='$copies',
                    publisherName='$publisher',
                    publication='$publication',
                    available='$available',
                    categories='$categories' WHERE bookId='$id'";
                    $query_edit = mysqli_query($conn, $edit);
            
                    if ($query_edit) {
                        $edit = 1;
                        mysqli_close($conn);
                        header("Location:books.php?edit=".$edit);
                    } else {
                        echo "<script>alert('Error');window.history.go(-1);</script>";
                    }
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
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>

<?php 
include './includes/nav_admin.php';
$book_id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM books WHERE bookId='$book_id'");

while($data=mysqli_fetch_array($query)){
?>
    <div class="row justify-content-center mt-2">
        <div class="col-sm-8">
            <div class="container p-5 mt-1">
                <div class="card card-body bg-light ">
                    <div class="textcenter">
                            <h1><center>EDIT DATA</center></h1><br>
                        </div>
                        <form action="edit_buku.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">ID Buku</label><br>
                                <input type="number" class="form-control" name="id" value="<?= $data['bookId'] ?>" readonly>
                            </div>

                            <div class="form-group  mt-3">
                                <img src="./cover/<?php echo $data['picture']?>" width="170" height="250"><br>
                                <label class="form-label">Cover Buku</label>
                                <input type="file" class="form-control" name="foto">  
                                <p>Hanya bisa ekstensi .png, .jpg, .jpeg dan size maksimal 2 MB</p>    
                            </div> 

                            <div class="mb-3">
                                <label class="form-label">Judul Buku</label><br>
                                <input type="text" class="form-control" name="title" value="<?= $data['bookTitle'] ?>">
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
                                    <option value="<?php echo $rows['author'] ?>" <?php if($rows['author'] == $data['author'])echo 'selected="selected"'; ?>><?php echo $rows['author'] ?></option>
                                <?php
                                    };
                                ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Sinopsis</label><br>
                                <textarea name="sinopsis" class="form-control" cols="200" rows="15"><?php echo $data['sinopsis'] ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Halaman</label><br>
                                <input type="number" class="form-control" name="page" value="<?php echo $data['page'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">ISBN</label><br>
                                <input type="text" class="form-control" name="isbn" value="<?= $data['ISBN'] ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Banyak Buku</label><br>
                                <input type="number" class="form-control" name="copies" value="<?= $data['bookCopies'] ?>">
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
                                    <option value="<?php echo $rows['publisherName'] ?>" <?php if($rows['publisherName'] == $data['publisherName'])echo 'selected="selected"'; ?>><?php echo $rows['publisherName'] ?></option>
                                <?php
                                    };
                                ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Publikasi</label><br>
                                <input type="date" class="form-control" name="publication" value="<?= $data['publication'] ?>" required>
                            </div>

                            <?php
                            $cek = $data['available'];
                            if($cek == "YES"){
                            ?>
                                <label class="form-label">Tersedia: </label>
                                <input type="radio" name="available" value="YES" checked required>
                                <label>YES</label>
                                <input type="radio" name="available" value="NO" required>
                                <label>NO</label><br>
                            <?php 
                            }
                            elseif($cek == "NO"){
                            ?>
                                <label class="form-label">Tersedia: </label>
                                <input type="radio" name="available" value="YES" required>
                                <label>YES</label>
                                <input type="radio" name="available" value="NO" checked required>
                                <label>NO</label><br>
                            <?php 
                            }
                            ?>

                            <div class="mb-3">
                                <label class="form-label">Kategori</label><br>
                                <select class="form-control" name="categories" onmousedown="if(this.options.length>5){this.size=5;}"  onchange='this.size=0;' onblur="this.size=0;">
                                    <?php 
                                        $conn = mysqli_connect("localhost","root","","library_db");
                                        $result = mysqli_query($conn, "SELECT * FROM category") or die(mysqli_error($conn));
                                        while($rows = mysqli_fetch_array($result)) 
                                        {  
                                    ?>
                                        <option value="<?php echo $rows['categories'] ?>" <?php if($rows['categories'] == $data['categories'])echo 'selected="selected"'; ?>><?php echo $rows['categories'] ?></option>
                                    <?php
                                        };
                                    ?>
                                    </select>
                            </div>

                            <button class="btn btn-success" type="submit" name="edit_buku"><span class="bi bi-pencil-square"> Edit</span></button>
                            <a class="btn btn-primary" href="books.php">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    }
?>
</body>
</html>