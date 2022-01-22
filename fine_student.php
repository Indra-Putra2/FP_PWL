<?php 
    session_start();
    include "includes/user_check.php";
    include "./includes/conn.php";
	if(isset($_COOKIE['nameUser'])){
		$user = $_COOKIE['nameUser'];
	}else{
		$user = $_SESSION['usernameUser'];
	}

	function rupiah($angka){
		if($angka == "Paid"){
			$hasil_rupiah = "Paid";
		}else{
			$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
		}
		return $hasil_rupiah;
    }

    if(isset($_POST['del'])){
        $id = trim($_POST['del-btn']);

        $sql = "DELETE  FROM student where id = '$id'";
        $query = mysqli_query($conn, $sql);
        $error = false;
        if($query){
            $error = true;
        }
    }

	if (isset($_POST['check'])) {
	$id = $_POST['id'];
		
	$sql = "SELECT returnDate,fine from borrow where borrowId = '$id'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($query);
	$paid = $row['fine'];
	$now = date_create(date('Y-m-d'));
	"<br>";
	$prev =  date_create(date("Y-m-d",strtotime($row['returnDate'])));
	"<br>";
	$diff = date_diff($prev,$now);
	"<br>";
	$diff = str_replace('+', '', $diff->format('%R%a'));
		if ($paid == "Paid"){
			$add = "UPDATE `borrow` SET `fine`= 'Paid' WHERE borrowId = '$id'";
			$query = mysqli_query($conn, $add);
		}
		else if ($diff > 0) {
		// echo "greater";
		$fine = 5000 * $diff;

		$add = "UPDATE `borrow` SET `fine`= '$fine' WHERE borrowId = '$id'";
		$query = mysqli_query($conn, $add);
		}
		else if ($now < $prev){
		// echo "lesser";
		$add = "UPDATE `borrow` SET `fine`= '0' WHERE borrowId = '$id'";
		$query = mysqli_query($conn, $add);
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

    <title>Fines</title>
</head>
<body>
<?php include "includes/nav_user.php"; ?>
<div class="container">
	<div class="container p-1 mt-5">
		<h2 class="mb-5"><center>Cek Denda</center></h2>
        <div class="card card-body bg-light">
			<table class="table table-striped">
		          <thead class="table-dark">
		               <tr> 
		                  <th>ID</th>
		                  <th>Nim</th>
		                  <th>Nama Buku</th>
		                  <th>Tanggal Pinjam</th>
		                  <th>Tanggal Kembali</th>
		                  <th>Denda</th>
						  <th>Cek</th>
		                </tr>    
		          </thead>  

				  <tbody>
		           
				   <?php 
                  		$sql = "SELECT * FROM borrow where Nim = '$user' ORDER BY returnDate";
                  		$query = mysqli_query($conn, $sql);
                  		$counter = 1;
                  		while($row = mysqli_fetch_assoc($query)) { 
                   ?>

		            <tr> 
						<td><?php echo $counter ++; ?></td>
						<td><?php echo $row['Nim']; ?></td>
						<td><?php echo $row['bookName']; ?></td>
						<td><?php echo $row['borrowDate']; ?></td>
						<td><?php echo $row['returnDate']; ?></td>
						<td><?php echo rupiah($row['fine']); ?></td>
						<td>
							<form action="fine_student.php" method="post">
								
								<input type="hidden" name="id" value="<?php echo $row['borrowId']; ?>">
								<button name="check" type="submit" class="btn btn-warning">CHECK</button>
							</form>
		             	</td>
		            </tr> 
		            <?php } ?> 
		         </tbody> 
		   	</table>
			<p><b>Note: Check Terlebih Dahulu</b></p>
        </div>
    </div>
</body>
</html>