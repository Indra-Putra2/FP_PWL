<?php
include 'includes/conn.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowed Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
    <?php include "includes/nav_admin.php"; ?>
    <div class="container">
        <div class="container">
           <div class="container p-1 mt-5">
		<h2 class="mb-5"><center>Daftar Peminjam</center></h2>
        <div class="card card-body bg-light">
			<table class="table table-striped">
		          <thead class="table-dark">
                 <tr> 
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Member Name</th>
                    <th>NIM</th>
                        
                </tr>    
            </thead>
            <?php

                $sql = "SELECT * FROM borrow, students WHERE borrow.Nim = students.nim"; 	
                        
                 $query = mysqli_query($conn, $sql);
                 $counter =1;
                        while($row = mysqli_fetch_array($query)){                               
                            
                        ?>
                                <tbody>
                                <tr>
                                <td><?php echo $counter++; ?></td>
                                <td><?php echo $row['bookName'];?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['Nim']; ?></td>
                                </tr>
                                </tbody>
                            <?php }
                    
                        ?>
             </table>
            
        </div>
        </div>
        <div class="mod modal fade" id="popUpWindow">
                <div class="modal-dialog">
                    <div class="modal-content">
                        
                        <!-- header begins here -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title"> Warning</h3>
                        </div>

                        <!-- body begins here -->
                        <div class="modal-body">
                            <p>Are you sure you want to delete this book?</p>
                        </div>

                        <!-- button -->
                        <div class="modal-footer ">
                            <button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-warning pull-right"  style="margin-left: 10px" class="close" data-dismiss="modal">
                                No
                            </button>&nbsp;
                            <button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-success pull-right"  class="close" data-dismiss="modal" data-toggle="modal" data-target="#info">
                                Yes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="info">
                <div class="modal-dialog">
                    <div class="modal-content">
                        
                        <!-- header begins here -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title"> Warning</h3>
                        </div>

                        <!-- body begins here -->
                        <div class="modal-body">
                            <p>Book deleted <span class="glyphicon glyphicon-ok"></span></p>
                        </div>

                    </div>
                </div>
            </div>
            




    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>	
    <script type="text/javascript">
    //$(".show-in").on("click", function(e){
        e.preventDefault();
        var book_id = $(this).find(".book-id"); //Get the id of the book;
        book_id = book_id.val();

        var book_name = $(this).find(".book-name"); //Get the name of the book;
        book_name = book_name.val();

        var purpose = $(this).find(".purpose"); //Get the purpose of the passing the value;
        purpose = purpose.val();

        if(purpose == "show"){
            alert(book_name);
        }
    //})

    </script>
</body>
</html>