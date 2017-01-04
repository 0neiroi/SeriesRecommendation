<?php
// connexion à la bdd
require 'script/base.php';
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
        <link href="styles/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="styles/style.css" rel="stylesheet">
        <link rel="stylesheet" href="styles/styleconnexion.css"/>
        <meta charset="UTF-8">
        <title>Home | Series Choice</title>

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
			      <li class="active"><a href="index.php">Home</a></li>
			      <li class="dropdown">
			        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Series
			        <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			          	<li><a href="script/search.php?search=action">Action</a></li>
				        <li><a href="script/search.php?search=adventure">Adventure</a></li>
			          	<li><a href="script/search.php?search=fantasy">Fantasy</a></li>
		                <li><a href="script/search.php?search=animation">Animation</a></li>
		                <li><a href="script/search.php?search=drama">Drama</a></li>
		                <li><a href="script/search.php?search=horror">Horror</a></li>
		                <li><a href="script/search.php?search=comedy">Comedy</a></li>
		                <li><a href="script/search.php?search=western">Western</a></li>
		                <li><a href="script/search.php?search=thriller">Thriller</a></li>
		                <li><a href="script/search.php?search=crime">Crime</a></li>
		                <li><a href="script/search.php?search=documentary">Documentary</a></li>
		                <li><a href="script/search.php?search=sciencefiction">Science Fiction</a></li>
		                <li><a href="script/search.php?search=mystery">Mystery</a></li>
		                <li><a href="script/search.php?search=music">Music</a></li>
		                <li><a href="script/search.php?search=romance">Romance</a></li>
		                <li><a href="script/search.php?search=family">Family</a></li>
		                <li><a href="script/search.php?search=war">War</a></li>
		                <li><a href="script/search.php?search=action&adventure">Action & Adventure</a></li>
		                <li><a href="script/search.php?search=kids">Kids</a></li>
		                <li><a href="script/search.php?search=news">News</a></li>
		                <li><a href="script/search.php?search=reality">Reality</a></li>
		                <li><a href="script/search.php?search=sciencefiction&search=fantasy">Sci-Fi & Fantasy</a></li>
		                <li><a href="script/search.php?search=soap">Soap</a></li>
		                <li><a href="script/search.php?search=talk">Talk</a></li>

			        </ul>
			      </li>
			      <li><a href="script/series_utilisateur.php?id=1">Profil</a></li>
			    </ul>
			    <form class="navbar-form navbar-left" action="script/search.php" method="get">
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
                echo '<li><a href="script/personal-space.php"><span class="glyphicon glyphicon-film"></span> Account</a></li>';
                echo '<li><a href="script/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
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
                            <form action="script/personal-space.php" method="post">
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
                            <form action="script/registration.php" method="post">
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

        <!-- -->
      <?php 
          if (isset($_SESSION["genres"])){
            $sql = 'SELECT backdrop_path,series.id,series.name FROM series INNER JOIN seriesgenres ON series.id=seriesgenres.series_id INNER JOIN genres ON seriesgenres.genre_id=genres.id WHERE ';  
            for ($i=0; $i < count($_SESSION["genres"]) ; $i++){
              
              $sql.=" genres.name LIKE \"";
              $sql.=$_SESSION["genres"][$i];
              if($i+1<count($_SESSION["genres"])){$sql.="\" OR ";} 
              else{$sql.="\"";}

            }
          }else{
            $sql = 'SELECT backdrop_path,series.id,series.name FROM series;';  
          }

			// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
			$req = $connection->prepare($sql); 
			$req->execute();
			$rows = $req->fetchAll();

         ?>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 background">
              <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div> 
          <div class="panel panel-default col-lg-6 col-xs-6">
          <div id="myCarousel" class="carousel slide panel-body" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active"><?php
                $ligne = $rows[rand(0,sizeof($rows))];?>
                <a href="script/seriebis.php?id=<?php echo $ligne['id'];?>"><img src="https://image.tmdb.org/t/p/w640/<?php echo $ligne['backdrop_path']; ?>" alt="<?php echo $ligne['series.name']?>;"></a>
                </div>

                <div class="item">
                  <?php
                $ligne = $rows[rand(0,sizeof($rows))];?>
                <a href="script/seriebis.php?id=<?php echo $ligne['id'];?>"><img src="https://image.tmdb.org/t/p/w640/<?php echo $ligne['backdrop_path']; ?>" alt="<?php echo $ligne['series.name']?>;"></a>
                </div>

                <div class="item">
                  <?php
                $ligne = $rows[rand(0,sizeof($rows))];?>
                <a href="script/seriebis.php?id=<?php echo $ligne['id'];?>"><img src="https://image.tmdb.org/t/p/w640/<?php echo $ligne['backdrop_path']; ?>" alt="<?php echo $ligne['series.name']?>;"></a>
                </div>

                <div class="item">
                  <?php
                $ligne = $rows[rand(0,sizeof($rows))];?>
                <a href="script/seriebis.php?id=<?php echo $ligne['id'];?>"><img src="https://image.tmdb.org/t/p/w640/<?php echo $ligne['backdrop_path']; ?>" alt="<?php echo $ligne['series.name']?>;"></a>
                </div>
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>

         </div>   

          </div>

        </div>
         
         
        <footer class="row">
            <div class='row'>
                <div class='col-lg-2 col-md-2 col-sm-2'></div> 
                <div class='col-lg-4 col-md-6 col-sm-9 col-xs-12'> 
                  
                    <p><h3>Map Site</h3></p>
                    <p><a href="#">Home</a></br>
                    <a href="pages/series.html">Series</a></br>
                    <a href="script/series_utilisateur.php?id=1">Profil</a></br> 
                    <a href="script/search.php?search=fantasy">Search</a></p>
                  
                </div>
                
                <div class="col-lg-3 col-md-12 col-sm-3 col-xs-12 col-lg-offset-1">
                    <div class='row'>
                      <div class="social"> 
                        <div class='col-lg-2 col-md-2 col-sm-2 col-xs-2' >
                            <img class='img-responsive' src="img/tw.png" alt="twitter">
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>
                            <img class="img-responsive" src="img/fb.png" alt="facebook"/>
                        </div >
                        <div class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>
                            <img class='img-responsive' src='img/ins.png' alt="instagram"/>
                        </div>
		                  	<div class='col-lg-4 col-md-4 col-sm-4 col-xs-4'>
                            <img class='img-responsive' src='img/logo-sc.png' alt=sciences-cognitives/>
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
