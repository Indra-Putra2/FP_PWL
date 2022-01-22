<?php
// memasukkan data ke database
session_start();
include "includes/admin_check.php";
include "./includes/function.php";

if (!empty($_POST)) {
    // memasukkan data dari user ke dalam variabel
    $AdminName = $_POST['admin_name'];
    $Password = md5($_POST['Password']);
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];

    // membangun koneksi ke database
    include "./includes/conn.php";

    if (isset($_POST['submit'])) {

        // memasukkan data ke database
        $sql = "INSERT INTO admin ( adminName, password, username, email) VALUES ('$AdminName' , '$Password', '$Username', '$Email' )";

        $query_insert = mysqli_query($conn, $sql);

        if ($query_insert) {
            echo "<script>alert('Data Berhasil Ditambahkan');location='admin.php';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    } elseif (isset($_POST['edit'])) {
        $edit = "UPDATE admin SET adminName='$AdminName', password='$Password', email='$Email' WHERE username='$Username'";
        $query_edit = mysqli_query($conn, $edit);

        if ($query_edit) {
            echo "<script>alert('Data Berhasil Diubah');location='admin.php';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    }
} else if (!empty($_GET)) {

    if ($_GET["action"] === "hapus") {
        // koneksi database
        include "./includes/conn.php";

        // menangkap data id yang di kirim dari url
        $userName = $_GET['username'];

        // menghapus data dari database
        mysqli_query($conn, "delete from admin where username='$userName'");

        // mengalihkan halaman kembali ke index.php
        header("location:admin.php");
    }
}

?>