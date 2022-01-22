<?php
include 'includes/conn.php';

if($_GET["action"]=="hapus"){
       
    $id=$_GET['nim'];
    mysqli_query($conn,"DELETE FROM students WHERE nim='$id'");
    header("location:tampilstudent.php?hapus=berhasil");
}
?>