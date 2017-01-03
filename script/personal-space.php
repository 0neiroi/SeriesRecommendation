<?php
// Connect to the database
require('base.php');

// Start session
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

            <marquee>
                <div class="row">
                    <div class="col-lg-2 col-xs-2"><!--mettre plein d'images ici--> </div>
                </div>
            </marquee>
            
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

			<?php
			// If a username has been submitted, check username and password
			if (isset($_POST["identifier1"])){
		    	// Check username and password
				$username = $_POST['identifier1'];
				$password = $_POST['password1'];

			 	// Check username and password
				$query = "SELECT salt,password,id FROM users WHERE name=:username";
				$statement = $connection->prepare($query);
				$statement->bindValue(":username", $username, PDO::PARAM_STR);
				$statement->execute();
				$row = $statement->fetch(PDO::FETCH_ASSOC);
				// If successful, add the username to a session variable
        
				if ($row['password'] == hash('sha384', $password.$row['salt'])) {
					$_SESSION["username"] = $username;
          $_SESSION["id"] = $row['id'];
				}
			}


			// If the user is connected (has a session), display the corresponding information
			if (isset($_SESSION["username"])){

				$username = $_SESSION["username"];
				
				// Get email information and display
				$query1 = "SELECT email, gets_emails FROM users WHERE name=:username";
				$statement1 = $connection->prepare($query1);
				$statement1->bindValue(":username", $username, PDO::PARAM_STR);
				$statement1->execute();
				$row1 = $statement1->fetch(PDO::FETCH_ASSOC);
				$email = $row1['email'];
				$gets_emails = $row1['gets_emails'];
				echo "<p>Informations de $username :</p>";
				echo "<p>Adresse email : $email</p>";
				if ($gets_emails){
					echo "<p>Reçoit des emails de la part du site.</p>";
				}
				else{
					echo "<p>Ne reçoit pas d'emails de la part du site.</p>";
				}

				// Get genre information and display
				echo "<div>Genres favoris :";
				echo "<ul>";
				$query2 = "SELECT genre FROM users, usersgenre WHERE users.id = usersgenre.user_id AND users.name=:username";
				$statement2 = $connection->prepare($query2);
				$statement2->bindValue(":username", $username, PDO::PARAM_STR);
				$statement2->execute();
				$rows = $statement2->fetchAll();
				$genres = array();
				for ($i = 0; $i < sizeof($rows); $i++){
					$row2 = $rows[$i];
					$genres[$i] = $row2['genre'];
					echo "<li>".$row2['genre']."</li>";
				}
				echo "</ul></div>";
				echo "<p><a href='modify-user-data.php'>Modifier les informations</a></p>";

				// Save everything in session variables
				$_SESSION["email"] = $email;
				$_SESSION["gets_emails"] = $gets_emails;
				$_SESSION["genres"] = $genres;
			}

			// If no username variable in the session, authentication error
			else{
				echo "<p class='error'>Erreur d'authentification. Retournez sur la page d'accueil et essayez à nouveau de nous connecter.</p>";
				echo '<p><a href="../">Retour vers la page d\'accueil..</a></p>';
			}
			?>
		
</div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                <!-- <img src=recuperer les images de chaque saison alt= saison x /> -->
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



