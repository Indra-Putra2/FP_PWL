<?php
include 'conn.php';
// memasukkan data ke database
function validate($data)
    {
        $data = trim($data); // " String   " -> "String"
        $data = stripslashes($data); // " \n \fsaf" -> "n fsaf"
        $data = htmlspecialchars($data); // "<a>Link</a>" -> "&lt;a&gt;Link&lt;/a&gt;"
        return $data;
    }

if(!empty($_POST)){
  // memasukkan data dari user ke dalam variabel
    $newsId = validate($_POST['newsId']);
    $news = validate($_POST['announcement']);

    // membangun koneksi ke database
    //$conn = mysqli_connect("localhost", "root", "", "starbelly");
    /*
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    */
    if (isset($_POST['submit'])) { 

        // memasukkan data ke database
        $sql = "INSERT INTO news(announcement) VALUES ('$news')";
    
        $query = mysqli_query($conn, $sql);
    
        if ($query) {
            echo "<script>alert('Data berhasil ditambahkan');
            location='../homeAdmin.php';
            </script>";
            //header("Refresh:3; location:index.php");
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    } elseif(isset($_POST['edit'])){
        $edit = "UPDATE news SET announcement='$news' WHERE newsId='$newsId'";
        
        $query_edit = mysqli_query($conn, $edit);

        if ($query_edit) {
            echo "<script>alert('Data berhasil diubah');location='../homeAdmin.php';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    }
} elseif(!empty($_GET)){
    if($_GET['action'] === "delete"){
        
        $newsId = $_GET['newsId'];
        $delete = "DELETE FROM news WHERE newsId='$newsId'";
        $query_delete = mysqli_query($conn, $delete);

        if ($query_delete) {
            echo "<script>alert('Data berhasil dihapus');location='../homeAdmin.php';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }

        //mysqli_query($conn, "DELETE FROM news WHERE newsId='$newsId'");

        //header("location:../homeAdmin.php");
/*
        $query_hapus = mysqli_query($conn, "DELETE FROM menus 
            WHERE kodeMenu='$kodeMenu'");

        if ($query_hapus) {
            echo "<script>alert('Data berhasil dihapus');location:'index.php';</script>";
        } else {
            echo "<script>alert('Data gagal dihapus');</script>";
        }
        */
    }
}
?>