<?php 
//content = 1 = tambah data
//content = 2 = view data
//content = 3 = edit data

session_start();
include "includes/admin_check.php";
include "./includes/nav_admin.php";
include "./includes/conn.php";

$tampil = 5;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }

    if($page =="" || $page ==1)
    {
        $page1 = 0;
    }else{
        $page1 = ($page*$tampil)-$tampil;
    }

$paging = mysqli_query($conn, "SELECT * FROM authors LIMIT $page1,$tampil") or die(mysqli_error($conn));

$result = mysqli_query($conn, "SELECT * FROM authors") or die(mysqli_error($conn));
$jumlah = mysqli_num_rows($result);
$count = ceil($jumlah/$tampil);

    if(isset($_POST['submit'])){
        $author = mysqli_real_escape_string($conn,$_POST['author']);

        $sql =  "INSERT INTO authors VALUES ('$author')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            global $content;
            $content = 2;
            header("Location:tambah_author.php?tambah=1");
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title>Input Pengarang</title>
    </head>
<body>
    <div class="row justify-content-center mt-2">
        <div class="col-sm-8">
            <div class="container p-5 mt-1">
            <?php
            if(isset($_GET['tambah'])==1){
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil Di Ditambah</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }?>
                <h1>Menambahkan Pengarang</h1>
                <form method="POST" action="tambah_author.php">
                    <div class="mb-3">
                        <label class="form-label">Pengarang</label>
                        <input type="text" class="form-control"name="author">
                    </div>
                    <button type="submit" class="btn btn-success" name="submit">Tambah</button>
                </form>
            </div>

            <div class="container p-5">
                <h1>Data Pengarang</h1>
                <div class="card card-body bg-light ">
                    <table class="table table-striped" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 90%;">Pengarang</th>
                                <th scope="col" style="width: 10%;">Edit</th>
                            </tr>
                        </thead>

                        <?php while($rows = mysqli_fetch_assoc($paging)) 
                            {
                        ?>
                            <tr>
                                <td><?php echo $rows['author']?></td>
                                <form method="POST" action="edit_Pengarang.php">
                                    <td><a class="btn btn-warning" href="edit_author.php?author=<?php echo $rows['author']?>"><span class="bi bi-pencil-square"> Edit</span></a></td>
                                </form>
                            </tr>
                        <?php
                            }
                        ?>
                    </table>
                <div>
            </div>
        </div>
    </div>

    <?php
        echo   '<ul id="paging" class="pagination justify-content-center mt-2">';
        //Previous Button
        if($page > 1){
            ?><li class="page-item"><a class="page-link" href="tambah_author.php?page=<?php echo $page-1; ?>">Previous</a></li><?php
        }
        //Page Number Limit
        if($count > 5 && $page < 3){
            for($a=1; $a<= 5; $a++){
                ?><li class="page-item <?php if ($page == $a) echo 'active'; ?>"><a class="page-link " href="tambah_author.php?page=<?php echo $a; ?>"><?php echo $a ?></a></li><?php
            }
            ?><li class="page-item"><a class="page-link">...</a></li><?php
            ?><li class="page-item <?php if ($page == $a) echo 'active'; ?>"><a class="page-link " href="tambah_author.php?page=<?php echo $count; ?>"><?php echo $count ?></a></li><?php
        }if($page >= 3 && $page+2 < $count){
            for($a=$page-2; $a<= $page+2; $a++){
                ?><li class="page-item <?php if ($page == $a) echo 'active'; ?>"><a class="page-link " href="tambah_author.php?page=<?php echo $a; ?>"><?php echo $a ?></a></li><?php
            }
            if($page + 2 < $count){
                ?><li class="page-item"><a class="page-link">...</a></li><?php
            }
            ?><li class="page-item <?php if ($page == $a) echo 'active'; ?>"><a class="page-link " href="tambah_author.php?page=<?php echo $count; ?>"><?php echo $count ?></a></li><?php
        }
        if($page+2 >= $count && $count > 5){
            for($a=$page-2; $a<= $count; $a++){
                ?><li class="page-item <?php if ($page == $a) echo 'active'; ?>"><a class="page-link " href="tambah_author.php?page=<?php echo $a; ?>"><?php echo $a ?></a></li><?php
            }
        }
        if($count <= 5){
            for($a=1; $a<= $count; $a++){
                ?><li class="page-item <?php if ($page == $a) echo 'active'; ?>"><a class="page-link " href="tambah_author.php?page=<?php echo $a; ?>"><?php echo $a ?></a></li><?php
            }
        }
        //Next Button
        if($page < $count){
            ?><li class="page-item"><a class="page-link" href="tambah_author.php?page=<?php echo $page+1; ?>">Next</a></li><?php
        }
        echo '</ul>';
    ?>
</body>
</html>