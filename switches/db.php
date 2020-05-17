<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie-encyclopedia";

//Setting up the Database Tables Names
$t1 = "movie";//Table for Movie
$t2 = "sm";//Table for Search Meta

//Opening the Database Connection
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//Setting up the Database Charset to UTF-8
	$conn->query('SET NAMES utf8');
?>