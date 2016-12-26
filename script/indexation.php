<?php
	// Connect to the database
	require 'base.php';

	// Character encoding of the database
	$connection->exec("SET NAMES 'utf8'");


	$query = "ALTER TABLE 'series' ADD FULLTEXT INDEX 'search' ('name', 'original_name');";
	$statement = $connection->prepare($query);
	//$statement->bindValue(":username", $username, PDO::PARAM_STR);
	$statement->execute();

?>