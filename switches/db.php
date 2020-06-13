<?php
<<<<<<< HEAD
$servername = "localhost";
$username = "root";
$password = "amish6655";
$dbname = "movie-encyclopedia";
=======
$servername = "";
$username = "";
$password = "";
$dbname = "";
>>>>>>> 342882adb9020ad8e79d1dd2afeebc74b1fb36b8

//Setting up the Database Tables Names
$t1 = "First Table Name";//Table for Movie
$t2 = "Second Table Name";//Table for Search Meta

//Opening the Database Connection
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//Setting up the Database Charset to UTF-8
	$conn->query('SET NAMES utf8');
?>
