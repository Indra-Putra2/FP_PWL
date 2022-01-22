<?php
$conn = mysqli_connect("localhost","root","","library_db");
    if(!$conn){
        die("Connetion Failed: " . mysqli_connect_error());
    }
?>