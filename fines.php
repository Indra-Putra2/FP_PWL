<?php
include "./includes/conn.php";
include "./includes/nav_admin.php";

$msg = "Paid";
if(isset($_POST['del'])){ 
        $id = trim($_POST['del-btn']);
        $sql = "UPDATE borrow SET fine = '$msg' WHERE borrowId = '$id'";
        $query = mysqli_query($conn, $sql);
        $error = false;
        if($query){
            header("location:fines.php");
            $error = true;
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fines</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>
<body>
  
<div class="container">
   <div class="row justify-content-center">
    <div class="card mt-5 pt-2 p-5"> 
        <h3 style="text-align: center;">Denda</h3>

    <div class="container">
        <div class="panel">
            <div class="panel-heading">
                <?php if(isset($error)==true){ ?>
                <div class="alert alert-success alert-dismissable fade show" role="alert">
                    <strong>Record Updated Successfully</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="true"></button>
                    
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="row mt-3">
    <table class="table table-striped">
        <thead class="table table-dark">
            <tr>
                <th>ID</th>
                <th>NIM</th>
                <th>ID Buku</th>
                <th>Nama Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Check</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
        <?php 
           $sql = "SELECT * FROM borrow";
           $query = mysqli_query($conn, $sql);
           while($row = mysqli_fetch_assoc($query)){
        ?>
        
            <tr>
                <td><?php echo $row['borrowId']; ?></td>
                <td><?php echo $row['Nim']; ?></td>
                <td><?php echo $row['bookId']; ?></td>
                <td><?php echo $row['bookName']; ?></td>
                <td><?php echo $row['borrowDate']; ?></td>
                <td><?php echo $row['returnDate']; ?></td>
                <td><?php echo $row['fine']; ?></td>
                <td>
                    <form action="fines.php" method="post">
                        <input type="hidden" value="<?php echo $row['borrowId']; ?>" name="del-btn">
                        <button class="btn btn-warning" name="del">Stop Count</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>
</div> 
</div>
</div>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>