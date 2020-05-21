<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

//Setting up the Database Tables Names
$t1 = "First Table Name";//Table for Movie
$t2 = "Second Table Name";//Table for Search Meta

//Opening the Database Connection
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//Setting up the Database Charset to UTF-8
	$conn->query('SET NAMES utf8');
?>
