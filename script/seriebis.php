<?php
// connexion à la bdd
require 'base.php';
$connection->exec("SET NAMES 'utf8'");
?>

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
// lancement de la requete
$sql = 'SELECT name FROM series WHERE id = "36"';

// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

// on recupere le resultat sous forme d'un tableau
$data = mysql_fetch_array($req);

// on libère l'espace mémoire alloué pour cette interrogation de la base
mysql_free_result ($req);
mysql_close ();
?>

Le titre de la série est :<br />
<?php echo $data['name'];
?>
</body>

<footer>
</footer>

</html>