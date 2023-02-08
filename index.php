<?php
	session_start();
	require('header.php');
	if(!isset($_SESSION["username"])){
		header("Location: signin.php");
		exit(); 
	}
	?>
	<!DOCTYPE html>
	<html lang="fr">
		<head>
			<title> Index</title>
		</head>
		<body>
			<div class="sucess">
			<h1>Welcome <?php echo $_SESSION['username']; ?></h1>
			<a href="logout.php">Log out</a>
			</div>
		</body>
</html>