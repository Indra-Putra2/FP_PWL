<?php
	session_start();
	include 'includes/conn.php';
	include 'includes/nav_admin.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Edit Form</title>
  </head>
  <body>
	<?php
	$newsId = $_GET['newsId'];
	$query = mysqli_query($conn, "SELECT * FROM news WHERE newsId='$newsId'");
	while($data = mysqli_fetch_array($query)){
		
	?>
    <div class="container mt-5">
			<h1 style="color:purple; text-align:center">Selamat Datang, 
			<?php 
			if(isset($_COOKIE['typeAdmin'])){
				echo $_COOKIE['typeAdmin'];}
			if(isset($_SESSION['nameAdmin'])){
				echo $_SESSION['nameAdmin'];}
			?></h1>
			<br>
			<br>
			<div class="card">
			<div class="card-header" style="text-align: center;">
				<h3>Edit Info dan Pengumuman</h3>
			</div>
			<div class="card-body">
				<form action="includes/homeAdmin_newsProcess.php" method="POST">
			<div class="mb-3">
				<label class="form-label">newsId</label>
            	<input type="text" class="form-control" name="newsId" value="<?php echo $data['newsId'] ?>" readonly>
			</div>
				<div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Pengumuman Baru</label>
          	  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="announcement"><?php echo $data['announcement'] ?></textarea>
            </div>
          <button type="submit" class="btn btn-primary" name="edit">Edit</button>
      	</form>
				
			</div>
			
		</div>
		
		</div>
		<?php
			}
		?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>