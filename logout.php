<?php
	session_start();
	require('header.php');
	if(session_destroy())
	{
		header("Location: index.php"); // une fois déconnecté l'utilisateur sera dirégé en page d'acceuil 
	}
?>