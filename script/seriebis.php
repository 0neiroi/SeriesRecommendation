<?php
// connexion à la bdd
$mysqli = new mysqli('localhost', 'ascgukp', 'qwsefvgy7uk', 'project');
if ($mysqli->connect_error) {
    die('Erreur de connexion ('.$mysqli->connect_errno.')'. $mysqli->connect_error);
}

// Création de la requête pour récupérer toutes les données liées à l'id
$requete = "SELECT * FROM series WHERE id = '36'";
$resultat = $mysqli->query ($requete);
$ligne = $resultat->fetch_assoc();
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>
 	<?php echo $ligne['name']; ?>
  </title>
</head>

<header>
</header>

<body>
<!-- affichage du titre -->
<h1>
	<?php echo $ligne['name']; ?>
</h1>

<!-- affichage de l'affiche (poster_path) -->
<div id="poster">
    <img src="<?php $ligne['poster_path'] ?>" alt="Affiche de la série" />
</div>

<!-- Affichage des infos relatives à la série -->
<div id="infos">
	<p>Backdrop path : <img src="<?php $ligne['backdrop_path'] ?>" alt="Chemin" /></p>
	<p>Overview : <?php echo $ligne['overview']; ?><p>
	<p>Homepage : <a href= '<?php $ligne['homepage'] ?>'></a></p>
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