<?php
// Fetch the session values
session_start();
$username = $_SESSION["username"];
$email = $_SESSION["email"];
$gets_emails = $_SESSION["gets_emails"];
$genres = $_SESSION["genres"];
// Connect to the database
require('base.php');
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
			      <li><a href="series_utilisateur.php">Profil</a></li>
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

        <div class="row panel panel-default">
            <div class="col-lg-9 col-md-9 col-sm-10 col-xs-8 col-xs-12 panel-body">
			<p>Modifier les informations de <?php echo $username; ?>.</p>

			<!-- Panel to change information -->
			<form action="update.php" method="post">
				<div id="credentials">
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
						<input type="text" id="email" name="email" value="<?php echo $email; ?>"/>
					</div>
				</div>

				<!-- Newsletter -->
				<div id="newsletterDiv">
					<input type="checkbox" id="newsletter" name="newsletter" <?php if ($gets_emails) echo "checked"; ?> />
					<label for="newsletter">Recevoir des mails de la part du site</label>
				</div>

				<!-- Choice of genres -->
				<p>
					Votre genre de séries :
				</p>

				<div id="genres">
                                <div>
                                  <input type="checkbox" name="genres[]" value="Adventure" <?php if (in_array("Adventure", $genres)) echo "checked" ?>/><label>Aventure</label>
                                  <input type="checkbox" name="genres[]" value="Fantasy" <?php if (in_array("Fantasy", $genres)) echo "checked" ?>/><label>Fantasy</label>
                                  <input type="checkbox" name="genres[]" value="Animation" <?php if (in_array("Animation", $genres)) echo "checked" ?>/><label>Animation</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Drama" <?php if (in_array("Drama", $genres)) echo "checked" ?>/><label>Drama</label>
                                  <input type="checkbox" name="genres[]" value="Horror" <?php if (in_array("Horror", $genres)) echo "checked" ?>/><label>Horror</label>
                                  <input type="checkbox" name="genres[]" value="Action" <?php if (in_array("Action", $genres)) echo "checked" ?>/><label>Action</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Comedy" <?php if (in_array("Comedy", $genres)) echo "checked" ?>/><label>Comedy</label>
                                  <input type="checkbox" name="genres[]" value="History" <?php if (in_array("History", $genres)) echo "checked" ?>/><label>History</label>
                                  <input type="checkbox" name="genres[]" value="Western" <?php if (in_array("Western", $genres)) echo "checked" ?>/><label>Western</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Thriller" <?php if (in_array("Thriller", $genres)) echo "checked" ?>/><label>Thriller</label>
                                  <input type="checkbox" name="genres[]" value="Crime" <?php if (in_array("Crime", $genres)) echo "checked" ?>/><label>Crime</label>
                                  <input type="checkbox" name="genres[]" value="Documentary" <?php if (in_array("Documentary", $genres)) echo "checked" ?>/><label>Documentary</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Science Fiction" <?php if (in_array("Science Fiction", $genres)) echo "checked" ?>/><label>Sci-Fi</label>
                                  <input type="checkbox" name="genres[]" value="Mystery" <?php if (in_array("Mystery", $genres)) echo "checked" ?>/><label>Mystery</label>
                                  <input type="checkbox" name="genres[]" value="Music" <?php if (in_array("Music", $genres)) echo "checked" ?>/><label>Music</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Romance" <?php if (in_array("Romance", $genres)) echo "checked" ?>/><label>Romance</label>
                                  <input type="checkbox" name="genres[]" value="Family" <?php if (in_array("Family", $genres)) echo "checked" ?>/><label>Family</label>
                                  <input type="checkbox" name="genres[]" value="War" <?php if (in_array("War", $genres)) echo "checked" ?>/><label>War</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Action & Adventure" <?php if (in_array("Action & Adventure", $genres)) echo "checked" ?>/><label>Action & Adventure</label>
                                  <input type="checkbox" name="genres[]" value="Kids" <?php if (in_array("Kids", $genres)) echo "checked" ?>/><label>Kids</label>
                                  <input type="checkbox" name="genres[]" value="News" <?php if (in_array("News", $genres)) echo "checked" ?>/><label>News</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Reality" <?php if (in_array("Reality", $genres)) echo "checked" ?>/><label>Reality</label>
                                  <input type="checkbox" name="genres[]" value="Sci-Fi & Fantasy" <?php if (in_array("Sci-Fi & Fantasy", $genres)) echo "checked" ?>/><label>Sci-Fi & Fantasy</label>
                                  <input type="checkbox" name="genres[]" value="Talk" <?php if (in_array("Talk", $genres)) echo "checked" ?>/><label>Talk</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Soap" <?php if (in_array("Soap", $genres)) echo "checked" ?>/><label>Soap</label>
                                  <input type="checkbox" name="genres[]" value="War & Politics" <?php if (in_array("War & Politics", $genres)) echo "checked" ?>/><label>War & Politics</label>
                                  <input type="checkbox" name="genres[]" value="TV Movie" <?php if (in_array("TV Movie", $genres)) echo "checked" ?>/><label>TV Movie</label>
                                </div>
                              </div>

				<div id="subscription">
					<input type="submit" value="Sauvegarder"/>
				</div>			
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



