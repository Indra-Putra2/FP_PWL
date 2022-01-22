<?php
session_start();
include 'includes/conn.php';

// var_dump($_SESSION);
// exit;
if(!isset($_COOKIE['nameUser'])){
    $number = $_SESSION['nameUser'];
}else{
    $number = $_COOKIE['nameUser'];
}


if (isset($_POST['submit'])) {
    // var_dump($_POST);
    // exit;
    $bid = trim($_POST['bookId']);
	$bdate = trim($_POST['borrowDate']);
	$due = trim($_POST['dueDate']);

	$bqry = mysqli_query($conn,"SELECT * FROM books where bookId = {$bid} ");
	$bdata = mysqli_fetch_array($bqry);

    $sql = "INSERT INTO borrow(Nim, bookId, bookName, borrowDate, returnDate, fine) values('$number', '$bid', '{$bdata['bookTitle']}', '$bdate', '$due', '0')";
	$query = mysqli_query($conn, $sql);
	$error = false;
	if($query){
		$error = true;
	}
	else {
		echo "
		<script>
		alert('Unsuccessful');
		</script>
	";
	}
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
    <?php include 'includes/nav_user.php';  ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card mt-5 pt-2 p-5"> 
                <?php if(isset($error)===true) { ?>
            <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Buku Berhasil di Pinjam!</strong>
                </div>
                <?php } ?>
                <h3 style="text-align: center;">Pinjam Buku</h3>

                <div class="container">
                    <form class="form-horizontal" role="form" action="lend-student.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="Book Title" class="col-sm-2 control-label">NAMA BUKU</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="bookId">
                                    <option>PILIH BUKU</option>
                                    <?php 
                                    $sql = "SELECT * FROM books";
                                    $query = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($query)) { ?>
                                    <option value="<?php echo $row['bookId'] ?>" <?php echo isset($_GET['bid']) && $_GET['bid'] == $row['bookId'] ? "selected" : "" ?>><?php echo $row['bookTitle']; ?></option>
                                    <?php	} ?>
                                    ?>

                                </select>
                            </div>		
                        </div>
                        <div class="form-group">
                            <label for="Member Card ID" class="col-sm-2 control-label">NIM</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="matric" value="<?php echo $number; ?>">
                            </div>		
                        </div>
                        <div class="form-group">
                            <label for="Borrow Date" class="col-sm-2 control-label">TANGGAL PENGAMBILAN</label>
                            <div class="col-sm-10">
                            <input type="date" class="form-control" name="borrowDate" id="brand">
                            </div>		
                        </div>
                        <div class="form-group">
                            <label for="Password" class="col-sm-2 control-label">TANGGAL PENGEMBALIAN</label>
                            <div class="col-sm-10" id="show_product">
                            <input type='date' class='form-control' name='dueDate'>
                            </div>		
                        </div>
                        

                        
                        <div class="form-group ">
                            <div class="col-sm-offset-2 col-sm-10 ">
                                <button type="submit" class="btn btn-info col-lg-4 " name="submit">
                                    Submit
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>

    <script>  
    $(document).ready(function(){  
        $('#brand').change(function(){  
            var brand_id = $(this).val();  
            $.ajax({  
                    url:"load_data.php",  
                    method:"POST",  
                    data:{brand_id:brand_id},  
                    success:function(data){  
                        $('#show_product').html(data);  
                    }  
            });  
        });  
    });  
    </script>
</body>
</html>