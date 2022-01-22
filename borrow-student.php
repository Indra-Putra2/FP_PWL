<?php
session_start();

include 'includes/conn.php';

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

	if (isset($_GET['search'])) {
		$keyword = $_GET['keyword'];

		$paging = mysqli_query($conn, "SELECT * FROM books WHERE bookTitle LIKE '%$keyword%'");
	} else {
		$paging = mysqli_query($conn, "SELECT * FROM books ORDER BY bookId LIMIT $page1,$tampil") or die(mysqli_error($conn));
	}
		$result = mysqli_query($conn, "SELECT * FROM books ORDER BY bookId") or die(mysqli_error($conn));
		$jumlah = mysqli_num_rows($result);
		$count = ceil($jumlah/$tampil);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Borrow Books</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<style>
        #kosong{
            width: 2%;;
        }
        #pendek {
            width: 5%;;
        }
        #sedang {
            width: 10%;;
        }
    </style>
</head>
<body>
	<?php include "includes/nav_user.php"; ?>

	<div class="container">
		<div class="panel panel-default">
		  <!-- Default panel contents -->
		  <div class="panel-heading">
		  	<div class="row">
			</div>
		  </div>
		  <div class="card card-body bg-light mt-5">
            <h3 class="mb-3"><center>Daftar Buku</center></h3>
            <form action="" method="get" class="d-flex">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Search" autocomplete="off">
                <button class="btn btn-outline-primary" type="submit" name="search" value="search"><span class="bi bi-search"></span></button>
            </form>
                <?php 
                while($rows = mysqli_fetch_array($paging)){         
                ?>
                <div class="card card-body bg-light mt-3">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                        <img src="./cover/<?php echo $rows['picture']?>" width="170" height="250">
                        </div>
                        <div class="col-lg-8">
                            <h2><?php echo $rows['bookTitle']?><br></h2>
                            <small><p style="display:inline">by <?php echo $rows['author']?> (Author)</p></small>
                            <small><p>Available: <?php echo $rows['available']?></p></small>
                            <textarea cols="100" rows="5" style="border: none; background-color: transparent; resize: none; outline: none;" readonly><?php echo $rows['sinopsis']?></textarea>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2 text-center">
                                    <small>Page</small><br>
                                    <small><span class="bi bi-layers"><br><?php echo $rows['page']?></span></small>
                                </div>
                                <div class="col-sm-2 text-center">
                                    <small>ISBN</small><br>
                                    <small><span class="bi bi-upc-scan"><br><?php echo $rows['ISBN']?></span></small>
                                    
                                </div>
                                <div class="col-sm-2 text-center">
                                    <small>Publisher</small><br>
                                    <small><span class="bi bi-building"><br><?php echo $rows['publisherName']?></span> </small>
                                      
                                </div>
                                <div class="col-sm-2 text-center">
                                    <small>Copies</small><br>
                                    <small><span class="bi bi-book"><br><?php echo $rows['bookCopies']?></span> </small>
                                    
                                </div>
                                <div class="col-sm-2 text-center">
                                    <small>Publication Date</small><br>
                                    <small><span class="bi bi-calendar"><br><?php echo $rows['publication']?></span></small>
                                    
                                </div>
                                <div class="col-sm-2 text-center">
                                    <small>Category</small><br>
                                    <small><span class="bi bi-funnel"><br><?php echo $rows['categories']?></span></small>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
							<a href="lend-student.php?bid=<?php echo $rows['bookId'] ?>" id="show" class="show-in"><button class="btn btn-success">Borrow Now</button>
							<input type="hidden" class="book-id" value="<?php echo $rows['bookId']; ?>">
							<input type="hidden" class="book-name" value="<?php echo $rows['bookTitle']; ?>">
							<input type="hidden" class="purpose" value="show">
							</a>
                        </div>
                    </div>
                </div>
			</div>
                <?php
                    }
                ?>
	  	</div>
	</div>

	<?php
		if(!isset($_GET['search'])){
			echo   '<ul id="paging" class="pagination justify-content-center mt-3">';
			//Previous Button
			if($page > 1){
				?><li class="page-item"><a class="page-link" href="borrow-student.php?page=<?php echo $page-1; ?>">Previous</a></li><?php
			}
			//Page Number Limit
			if($count > 5 && $page < 3){
				for($a=1; $a<= 5; $a++){
					?><li class="page-item <?php if ($page == $a) echo 'active'; ?>"><a class="page-link " href="borrow-student.php?page=<?php echo $a; ?>"><?php echo $a ?></a></li><?php
				}
				?><li class="page-item"><a class="page-link">...</a></li><?php
				?><li class="page-item <?php if ($page == $a) echo 'active'; ?>"><a class="page-link " href="borrow-student.php?page=<?php echo $count; ?>"><?php echo $count ?></a></li><?php
			}if($page >= 3 && $page+2 < $count){
				for($a=$page-2; $a<= $page+2; $a++){
					?><li class="page-item <?php if ($page == $a) echo 'active'; ?>"><a class="page-link " href="borrow-student.php?page=<?php echo $a; ?>"><?php echo $a ?></a></li><?php
				}
				if($page + 2 < $count){
					?><li class="page-item"><a class="page-link">...</a></li><?php
				}
				?><li class="page-item <?php if ($page == $a) echo 'active'; ?>"><a class="page-link " href="borrow-student.php?page=<?php echo $count; ?>"><?php echo $count ?></a></li><?php
			}
			if($page+2 >= $count && $count > 5){
				for($a=$page-2; $a<= $count; $a++){
					?><li class="page-item <?php if ($page == $a) echo 'active'; ?>"><a class="page-link " href="borrow-student.php?page=<?php echo $a; ?>"><?php echo $a ?></a></li><?php
				}
			}
			if($count <= 5){
				for($a=1; $a<= $count; $a++){
					?><li class="page-item <?php if ($page == $a) echo 'active'; ?>"><a class="page-link " href="borrow-student.php?page=<?php echo $a; ?>"><?php echo $a ?></a></li><?php
				}
			}
			//Next Button
			if($page < $count){
				?><li class="page-item"><a class="page-link" href="borrow-student.php?page=<?php echo $page+1; ?>">Next</a></li><?php
			}
			echo '</ul>';
		}
	?>
</body>
</html>


