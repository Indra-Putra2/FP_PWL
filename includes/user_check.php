<?php

if(isset($_SESSION['usernameAdmin']) || isset($_COOKIE['typeAdmin'])){
	return;
} else if (!isset($_SESSION['usernameUser']) && !isset($_COOKIE['typeUser'])){
	header("location:login.php");
}
?>