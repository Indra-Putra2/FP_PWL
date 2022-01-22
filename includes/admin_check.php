<?php
if(!isset($_SESSION['usernameAdmin']) && !isset($_COOKIE['typeAdmin'])){
	header("location:login.php");
	if(isset($_SESSION['usernameUser']) || isset($_COOKIE['typeUser'])){
		header("location:homeStudent.php");
	}
}

?>