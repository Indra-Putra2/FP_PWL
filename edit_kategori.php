<?php 
include "includes/admin_check.php";
include "./includes/nav_admin.php";
include "./includes/conn.php";

$edit_category = $_GET['category'];
$result = mysqli_query($conn, "SELECT * FROM category WHERE categories = '$edit_category'") or die(mysqli_error($conn));

if(isset($_POST['submit'])){
        $edit = $_POST['edit'];
        $category = $_POST['category'];
        $sql = "UPDATE category SET categories='$category' WHERE categories='$edit'";
        $query = mysqli_query($conn, $sql);
        if ($edit) {
            echo "<script>alert('Data Berhasil Diubah');location='tambah_kategori.php';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
    <title>Edit Kategori</title>
</head>
<body>
    <?php 
    while($rows = mysqli_fetch_assoc($result)){ 
    ?>
    <div class="row justify-content-center mt-2">
        <div class="col-sm-8">
            <div class="container p-5 mt-1">
                <h1>Mengedit Kategori</h1>
                <form method="POST" action="edit_kategori.php">
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <input type="hidden" name="edit" value="<?= $rows['categories'] ?>">
                        <input type="text" class="form-control"name="category" value="<?= $rows['categories'] ?>">
                    </div>
                    <button type="submit" class="btn btn-success" name="submit">Edit</button>
                    <a href="tambah_kategori.php" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <?php }?>
</body>
</html>