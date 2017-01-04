<!-- Récupération des épisodes dans la bdd sur le même principe que seriebis.php -->
<?php
// connexion à la bdd
require 'base.php';
$connection->exec("SET NAMES 'utf8'");

session_start();



?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href="../styles/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../styles/style.css" rel="stylesheet">
        <link rel="stylesheet" href="../styles/styleconnexion.css"/>
        <meta charset="UTF-8">
        <title><?php 


        $sql3 = 'SELECT number, series.name FROM seasons INNER JOIN seriesseasons ON seasons.id=seriesseasons.season_id INNER JOIN series ON series.id=seriesseasons.series_id WHERE seasons.id = ?;';

// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$req3 = $connection->prepare($sql3); 

//$idurl = $_GET['id']; 
$req3->bindValue(1, $_GET['id'], PDO::PARAM_STR);
$req3->execute();
$ligne = $req3->fetch();

        echo $ligne['name']; ?> Season <?php echo $ligne['number']; ?>  | Series Choice</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header>
           

            <nav class="navbar navbar-inverse">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <a class="navbar-brand" href="#">SeriesChoice</a>
			    </div>
			    <ul class="nav navbar-nav">
			      <li class="active"><a href="../">Home</a></li>
			      <li class="dropdown">
			        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Series
			        <span class="caret"></span></a>
			        <ul class="dropdown-menu">
                <li><a href="search.php?search=action">Action</a></li>
                <li><a href="search.php?search=adventure">Adventure</a></li>
                <li><a href="search.php?search=fantasy">Fantasy</a></li>
                <li><a href="search.php?search=animation">Animation</a></li>
                <li><a href="search.php?search=drama">Drama</a></li>
                <li><a href="search.php?search=horror">Horror</a></li>
                <li><a href="search.php?search=comedy">Comedy</a></li>
                <li><a href="search.php?search=western">Western</a></li>
                <li><a href="search.php?search=thriller">Thriller</a></li>
                <li><a href="search.php?search=crime">Crime</a></li>
                <li><a href="search.php?search=documentary">Documentary</a></li>
                <li><a href="search.php?search=sciencefiction">Science Fiction</a></li>
                <li><a href="search.php?search=mystery">Mystery</a></li>
                <li><a href="search.php?search=music">Music</a></li>
                <li><a href="search.php?search=romance">Romance</a></li>
                <li><a href="search.php?search=family">Family</a></li>
                <li><a href="search.php?search=war">War</a></li>
                <li><a href="search.php?search=action&adventure">Action & Adventure</a></li>
                <li><a href="search.php?search=kids">Kids</a></li>
                <li><a href="search.php?search=news">News</a></li>
                <li><a href="search.php?search=reality">Reality</a></li>
                <li><a href="search.php?search=sciencefiction&search=fantasy">Sci-Fi & Fantasy</a></li>
                <li><a href="search.php?search=soap">Soap</a></li>
                <li><a href="search.php?search=talk">Talk</a></li>
			        </ul>
			      </li>
			      <li><a href="series_utilisateur.php?id=1">Profil</a></li>
			    </ul>
			    <form class="navbar-form navbar-left" action="search.php" method="get">
				  <div class="input-group">
				    <input type="text" class="form-control" placeholder="Search" name="search">
				    <div class="input-group-btn">
				      <button class="btn btn-default" type="submit">
				        <i class="glyphicon glyphicon-search"></i>
				      </button>
				    </div>
				  </div>
				</form>
			    <ul class="nav navbar-nav navbar-right">
			      <li><a href="" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			      <?php  
              if (isset($_SESSION["username"])){
                echo '<li><a href="personal-space.php"><span class="glyphicon glyphicon-film"></span> Account</a></li>';
                echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';

      }else{
        echo '<li><a href="" data-toggle="modal" data-target="#myModal3"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
      }             
            ?>
			    </ul>
			  </div>
			</nav>


                <!-- Modal -->
                <div class="modal fade" id="myModal3" role="dialog">
                    <div class="modal-dialog">       
                        <div id="global">

                          <!-- Panel for connection -->
                          <div class="panel">
                            <form action="personal-space.php" method="post">
                              <div>
                                <div>
                                  <label for="identifier1">Identifiant</label>
                                  <input type="text" id="identifier1" name="identifier1" size="20"/>
                                </div>
                                <div>
                                  <label for="password1">Mot de passe</label>
                                  <input type="password" id="password1" name="password1"/>
                                </div>
                              </div>
                              
                              <div>
                                <input type="submit" id="connection" value="Connexion"/>
                              </div>
                            </form>
                          </div>

                        
                          
                        </div>
                    </div>           
                </div>

                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">       
                        <div id="global">
                          <!-- Panel for subscription -->
                          <div class="panel">
                            <form action="registration.php" method="post">
                              <div id="credentials">
                                <div>
                                  <label for="identifier2">Nom d'utilisateur</label>
                                  <input type="text" id="identifier2" name="identifier2" size="20"/>
                                </div>
                                <div>
                                  <label for="password2">Mot de passe</label>
                                  <input type="password" id="password2" name="password2"/>
                                </div>
                                <div>
                                  <label for="password3">Confirmation</label>
                                  <input type="password" id="password3" name="password3"/>
                                </div>
                                <div>
                                  <label for="email">Adresse email</label>
                                  <input type="text" id="email" name="email"/>
                                </div>
                              </div>
                              
                              <div id="newsletterDiv">
                                <input type="checkbox" id="newsletter" name="newsletter"/><label for="newsletter">Recevoir des mails de la part du site</label>
                              </div>
                              
                              <!-- Choice of genres -->
                              <p>
                                Votre genre de séries préféré :
                              </p>
                            
                              <div id="genres">
                                <div>
                                  <input type="checkbox" name="genres[]" value="Adventure"/><label>Aventure</label>
                                  <input type="checkbox" name="genres[]" value="Fantasy"/><label>Fantasy</label>
                                  <input type="checkbox" name="genres[]" value="Animation"/><label>Animation</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Drama"/><label>Drama</label>
                                  <input type="checkbox" name="genres[]" value="Horror"/><label>Horror</label>
                                  <input type="checkbox" name="genres[]" value="Action"/><label>Action</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Comedy"/><label>Comedy</label>
                                  <input type="checkbox" name="genres[]" value="History"/><label>History</label>
                                  <input type="checkbox" name="genres[]" value="Western"/><label>Western</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Thriller"/><label>Thriller</label>
                                  <input type="checkbox" name="genres[]" value="Crime"/><label>Crime</label>
                                  <input type="checkbox" name="genres[]" value="Documentary"/><label>Documentary</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Science Fiction"/><label>Sci-Fi</label>
                                  <input type="checkbox" name="genres[]" value="Mystery"/><label>Mystery</label>
                                  <input type="checkbox" name="genres[]" value="Music"/><label>Music</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Romance"/><label>Romance</label>
                                  <input type="checkbox" name="genres[]" value="Family"/><label>Family</label>
                                  <input type="checkbox" name="genres[]" value="War"/><label>War</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Action & Adventure"/><label>Action & Adventure</label>
                                  <input type="checkbox" name="genres[]" value="Kids"/><label>Kids</label>
                                  <input type="checkbox" name="genres[]" value="News"/><label>News</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Reality"/><label>Reality</label>
                                  <input type="checkbox" name="genres[]" value="Sci-Fi & Fantasy"/><label>Sci-Fi & Fantasy</label>
                                  <input type="checkbox" name="genres[]" value="Talk"/><label>Talk</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Soap"/><label>Soap</label>
                                  <input type="checkbox" name="genres[]" value="War & Politics"/><label>War & Politics</label>
                                  <input type="checkbox" name="genres[]" value="TV Movie"/><label>TV Movie</label>
                                </div>
                              </div>
                              
                              <div id="subscription">
                                <input type="submit" value="S'inscrire"/>
                              </div>            
                            </form>
                          </div>
                        </div>
                    </div>           
                </div>
<?php
// lancement de la requete
$sql = 'SELECT * FROM episodes INNER JOIN seasonsepisodes ON episodes.id=seasonsepisodes.episode_id INNER JOIN seasons ON seasonsepisodes.season_id=seasons.id WHERE seasons.id = ? ORDER BY episodes.number ;';

// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$req = $connection->prepare($sql); 

//$idurl = $_GET['id']; 
$req->bindValue(1, $_GET['id'], PDO::PARAM_STR);
$req->execute();

?>

<h1>
<?php 

              $sql5 = 'SELECT series.name, series.id FROM series INNER JOIN seriesseasons ON series.id=seriesseasons.series_id INNER JOIN seasons ON seasons.id=seriesseasons.season_id WHERE seasons.id = ?;';

// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$req5 = $connection->prepare($sql5); 

//$idurl = $_GET['id']; 
$req5->bindValue(1, $_GET['id'], PDO::PARAM_STR);
$req5->execute();
$donnees5 = $req5->fetch();
  echo '<a href="seriebis.php?id='.$donnees5['id'].'">'.$donnees5['name'].'</a>';
  ?> 

  | Season <?php 

              $sql2 = 'SELECT number FROM seasons WHERE id = ?;';

// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$req2 = $connection->prepare($sql2); 

//$idurl = $_GET['id']; 
$req2->bindValue(1, $_GET['id'], PDO::PARAM_STR);
$req2->execute();
$donnees = $req2->fetch();
  echo $donnees['number'];
  ?> 
</h1>

<!-- affichage de l'affiche (poster_path) -->

<?php
if(($donnees = $req->fetch())==FALSE){
}else{

do{
    echo '<div class="panel panel-default"><div id="infos" class="panel-body">
<h2>
  '.$donnees[1].'
</h2>

<div id="poster" class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
    <a href="" data-toggle="modal" data-target="#myModal2"><img class="img-rounded img-responsive" src="https://image.tmdb.org/t/p/w640/'.$donnees['still_path'].'" alt="Affiche de la série" /></a>
</div>

<!-- Modal -->
                <div class="modal fade" id="myModal2" role="dialog">
                    <div class="modal-dialog">       
                        <div id="global">
                  <img src="https://image.tmdb.org/t/p/w640/'.$donnees['still_path'].'" alt="Affiche de la série"/>          
                        </div>
                    </div>
                </div>



<!-- Affichage des infos relatives à la série -->
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
  <p>Episode n°'.$donnees[2].'</p>
  <p>Overview : '.$donnees[4].'<p>
  <p>Air date : '.$donnees[3].'</p>
</div>
';
if(isset($_SESSION['username'])){
  echo '<form method="post" action="verification.php?id='; 
  $sql4 = 'SELECT id FROM users WHERE name = ?;';

// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$req4 = $connection->prepare($sql4); 

//$idurl = $_GET['id']; 
$req4->bindValue(1, $_SESSION['username'], PDO::PARAM_STR);
$req4->execute();
$ligne2 = $req4->fetch();


  

  echo $ligne2['id'].'"><input class="hidden-lg hidden-md hidden-sm hidden-xs" type="text" name="numepisode" value="'.$donnees[2].'" /><input class="hidden-lg hidden-md hidden-sm hidden-xs" type="text" name="numsaison" value="'.$ligne['number'].'" /><input class="hidden-lg hidden-md hidden-sm hidden-xs" type="text" name="serie" value="'.$ligne['name'].'" /><input type="submit" class="btn-success" value="I\'ve seen it !"/> </form>';
}
echo '</div>
</div>';
  
  }while ($donnees = $req->fetch());

}

?>


        <footer class="row">
            <div class='row'>
                <div class='col-lg-2 col-md-2 col-sm-2'></div> 
                <div class='col-lg-4 col-md-6 col-sm-9 col-xs-12'> 
                  
                    <p><h3>Map Site</h3></p>
                    <p><a href="../">Home</a></br>
                    <a href="../pages/series.html">Series</a></br>
                    <a href="series_utilisateur.php?id=1">Profil</a></br> 
                    <a href="search.php?search=fantasy">Search</a></p>
                  
                </div>
                
                <div class="col-lg-3 col-md-12 col-sm-3 col-xs-12 col-lg-offset-1">
                    <div class='row'>
                      <div class="social"> 
                         <div class='col-lg-2 col-md-2 col-sm-2 col-xs-2' >
                            <img class='img-responsive' src="../img/tw.png" alt="twitter">
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>
                            <img class="img-responsive" src="../img/fb.png" alt="facebook"/>
                        </div >
                        <div class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>
                            <img class='img-responsive' src='../img/ins.png' alt="instagram"/>
                        </div>
			<div class='col-lg-4 col-md-4 col-sm-4 col-xs-4'>
                            <img class='img-responsive' src='../img/logo-sc.png' alt=sciences-cognitives/>
                        </div> 
                      </div> 
                    </div>
                    <div class='row'>
                        <div class="col-lg-6 col-md-6 col-sd-6 col-xs-6">
                            <a href='#'>Back up</a>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' id="copyright"> 
                    <p>Copyright</p>
                    <p>CHOLEZ - CULARD - NUCERA - RICHIER</p>
                    <p>L3 MIASHS Siences Cognitives </p>                    
                </div>
            </div>				
        </footer>
    </body>
</html>

