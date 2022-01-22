<?php
include "includes/conn.php";
function validate($data)
{
    $data = trim($data); // " String   " -> "String"
    $data = stripslashes($data); // " \n \fsaf" -> "n fsaf"
    $data = htmlspecialchars($data); // "<a>Link</a>" -> "&lt;a&gt;Link&lt;/a&gt;"
    return $data;
}
?>