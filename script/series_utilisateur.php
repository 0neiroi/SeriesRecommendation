<?php
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
        <title>Personal Space | Series Choice</title>

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
			      <li><a href="#">Profil</a></li>
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

        </header>

        <div class="panel panel-default">

        <div class="row panel-body">
          <?php 
            // Connect to the database
            require 'base.php';

            // Character encoding of the database
            $connection->exec("SET NAMES 'utf8'");

          ?>
          <h1>
          <?php
            // on affiche le nom de l'utilisateur a partir de son id transmi a la connection
            $req = $connection->prepare('SELECT name FROM users WHERE id = ?');

            if (isset($_SESSION["username"])){

				$id = $_SESSION["id"];
            	$req->execute(array($id));
			}else{
				echo "<p class='error'>Erreur d'authentification. Retournez sur la page d'accueil et essayez à nouveau de nous connecter.</p>";
				echo '<p><a href="../">Retour vers la page d\'accueil..</a></p>';
			}            	
            $donnee = $req->fetchAll();
  				  $genres = array();
  				  for ($i = 0; $i < sizeof($donnee); $i++){
  					 $donnee2 = $donnee[$i];
  					 $genres[$i] = $donnee2['name'];
  					 //echo var_dump($row2['id']);
  					 echo $donnee2['name'];
  				  }
              //echo $donnee;
          ?>
          </h1>
          <p> Vos séries en cours:</p>
          <?php
          // on va chercher le nom des séries que l'utilisateur a vues
            $name = $connection->prepare('SELECT DISTINCT name FROM series INNER JOIN seriesseasons ON series.id=seriesseasons.series_id INNER JOIN seasonsepisodes ON seriesseasons.season_id=seasonsepisodes.season_id INNER JOIN usersepisodes ON seasonsepisodes.episode_id=usersepisodes.episode_id WHERE user_id=?;');
             
            if (isset($_SESSION["username"])){

				$user_id = $_SESSION["id"];
				 $name->bindValue(1, $user_id, PDO::PARAM_STR);
  		      $name->execute();
            
            if(($donnees = $name->fetch())==FALSE){
              echo "<p> Vous n'avez commencé aucune série.</p>";
            }else{
              do{
                //pour chaque série que l'utilisateur regarde on va chercher la saison a laquelle il est et le dernier épisode qu'il a vu.
                $query = "SELECT DISTINCT MAX(seasons.number) FROM seasons INNER JOIN seriesseasons ON seasons.id=seriesseasons.season_id INNER JOIN series ON seriesseasons.series_id=series.id INNER JOIN seasonsepisodes ON seriesseasons.season_id=seasonsepisodes.season_id INNER JOIN usersepisodes ON seasonsepisodes.episode_id=usersepisodes.episode_id WHERE series.name=:name AND user_id=:user;";

                $season_max = $connection->prepare($query);
                $season_max->bindValue(":name", $donnees['name'], PDO::PARAM_STR);
            	$season_max->bindValue(":user", $user_id, PDO::PARAM_STR);
            	$season_max->execute();
                $max_s = $season_max->fetch();
                $query = "SELECT DISTINCT MAX(episodes.number) FROM episodes INNER JOIN seasonsepisodes ON episodes.id=seasonsepisodes.episode_id INNER JOIN seasons ON seasonsepisodes.season_id=seasons.id INNER JOIN seriesseasons ON seasons.id=seriesseasons.season_id INNER JOIN series ON seriesseasons.series_id=series.id INNER JOIN usersepisodes ON episodes.id=usersepisodes.episode_id WHERE  seasons.number=:max AND series.name = :name AND user_id=:user;";
                $episode_max = $connection->prepare($query);
                $episode_max->bindValue(":max", $max_s['MAX(seasons.number)'], PDO::PARAM_STR);
                $episode_max->bindValue(":name", $donnees['name'], PDO::PARAM_STR);
            	$episode_max->bindValue(":user", $user_id, PDO::PARAM_STR);
            	$episode_max->execute();
                $ep_max=$episode_max->fetch();

                echo "<p class='col-lg-3 col-md-3 col-sm-3 col-xs-12 col-lg-offset-2 col-sm-offset-2'> Vous en êtes à l'épisodes ".$ep_max['MAX(episodes.number)']." </p>";
                echo "<p class='col-lg-2 col-md-2 col-sm-3 col-xs-12'>de la saison ".$max_s['MAX(seasons.number)']."</p>";
                echo "<p class='col-lg-2 col-md-2 col-sm-3 col-xs-12'> de ".$donnees['name']."</p>";

                }while ($donnees = $name->fetch());
                $name->closeCursor();
                $season_max->closeCursor();
                $episode_max->closeCursor();
              }
			}else{
				echo "<p class='error'>Erreur d'authentification. Retournez sur la page d'accueil et essayez à nouveau de nous connecter.</p>";
				echo '<p><a href="../">Retour vers la page d\'accueil..</a></p>';
			}            	
            
            
           
          ?>
          <!-- on créer un formulaire pour que l'utilisateur puisse ajouter ce qu'il a vu dernierement -->
          <form method="post" action="verification.php?id=<?php echo $_GET['id'];?>">
              
              <p class='col-lg-2 col-md-2 col-sm-3 col-xs-12 col-lg-offset-2 col-sm-offset-3'>J'ai vu l'épisode <input type='number' name='numepisode'/> </p>
              <p class='col-lg-2 col-md-2 col-sm-3 col-xs-12'>de la saison <input type='number' name='numsaison'/> </p>
              <p class='col-lg-2 col-md-2 col-sm-3 col-xs-12'> de la série <input type='text' name='serie'/></p>
              <p class='col-lg-2 col-md-2 col-sm-3 col-xs-12 col-sm-offset-6'><input type="submit" value="OK"/></p>
              
          </form>
        </div>  
        </div>
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
