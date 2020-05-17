<?php
try {
		 $movie_fetch_all = $conn->prepare("SELECT * from $t1 where id = '$id'");
		 $movie_fetch_all->execute();
		 $dp = $movie_fetch_all->fetchAll();
	}
catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
?>