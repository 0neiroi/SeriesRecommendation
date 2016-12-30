<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>

<header>
</header>

<body>
<?php


// connexion à la bdd
require 'base.php';
$connection->exec("SET NAMES 'utf8'");

// lancement de la requete
$sql = 'SELECT name FROM series WHERE id = ?;';

// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$req = $connection->prepare($sql); 



$req->bindValue(1, "36", PDO::PARAM_STR);
$req->execute();

$rows = $req->fetchAll();
for ($i = 0; $i < sizeof($rows); $i++){
$row = $rows[$i];
}

?>

Le titre de la série est :<br />
<?php echo $row['name'];
?>
</body>

<footer>
</footer>

</html>