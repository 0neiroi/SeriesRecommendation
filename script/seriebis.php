<!doctype html>
<html lang="fr">

<?php
// connexion à la bdd
require 'base.php';
$connection->exec("SET NAMES 'utf8'");


// lancement de la requete
$sql = 'SELECT * FROM series WHERE id = ?;';

// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$req = $connection->prepare($sql); 

$idurl = $_GET['id']; 
$req->bindValue(1, $idurl, PDO::PARAM_STR);
$req->execute();

$rows = $req->fetchAll();
for ($i = 0; $i < sizeof($rows); $i++){
$ligne = $rows[$i];
}

?>

<head>
  <meta charset="utf-8">
  <title><?php echo $ligne['name']; ?></title>
</head>

<header>
</header>

<body>



<h1>
	<?php echo $ligne['name']; ?>
</h1>

<!-- affichage de l'affiche (poster_path) -->
<div id="poster">
    <img src="https://image.tmdb.org/t/p/w640/<?php echo $ligne['poster_path'] ?>" alt="Affiche de la série" />
</div>

<!-- Affichage des infos relatives à la série -->

<div id="infos">
	<p>Backdrop path : <img src="https://image.tmdb.org/t/p/w640/<?php echo $ligne['backdrop_path'] ?>" alt="Chemin" /></p>
	<p>Overview : <?php echo $ligne['overview']; ?><p>
	<p><a href= '<?php $ligne['homepage'] ?>'>Homepage</a></p>
	<p>First air date : <?php echo $ligne['first_air_date']; ?></p>
	<p>Last air date : <?php echo $ligne['last_air_date']; ?></p>
	<p>In production : <?php echo $ligne['in_production']; ?></p>
	<p>Original language : <?php echo $ligne['original_language']; ?></p>
	<p>Original name : <?php echo $ligne['original_name']; ?></p>
	<p>Number of episodes : <?php echo $ligne['number_of_episodes']; ?></p>
	<p>Number of seasons : <?php echo $ligne['number_of_seasons']; ?></p>
	<p>Popularity : <?php echo $ligne['popularity']; ?></p>
</div>

</body>

<footer>
</footer>

</html>