<?php
	// Connect to the database
	require 'base.php';

	// Character encoding of the database
	$connection->exec("SET NAMES 'utf8'");
	require 'indexation.php';
	$search = "";
	if (isset($_GET['search'])){
    	$search = $_GET['search'];
  }


	$query = "SELECT *
FROM series
WHERE MATCH(original_name, name) AGAINST (':search');";
	$statement = $connection->prepare($query);
	$statement->bindValue(":search", $search, PDO::PARAM_STR);
	$statement->execute();
echo "<div>Resultat de la recherche :";
				echo "<ul>";
	$rows = $statement->fetchAll();
				$genres = array();
				for ($i = 0; $i < sizeof($rows); $i++){
					$row2 = $rows[$i];
					$genres[$i] = $row2['name'];
					echo "<li>".$row2['name']."</li>";
				}
				echo "</ul></div>";

?>