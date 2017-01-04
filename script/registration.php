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
        <title>Registration | Series Choice</title>

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


        </header>

        <div id="corps" class="row panel panel-default">
            <div class="col-lg-9 col-md-9 col-sm-10 col-xs-8 col-xs-12 panel-body">


<?php
  // Connect to the database
  require('base.php');
  /**
   * Test if a character $c is in a string $s.
   */
  function contains($c, $s){
    for ($i = 0; $i < strlen($s); $i++){
      if ($s[$i] == $c){
        return true;
      }
    }
    return false;
  }
  
  /**
   * Check the availability of a user name.
   */
  function checkUserName($connection, $username){
    $query = "SELECT COUNT(*) AS count FROM users WHERE name=:username";
    $statement = $connection->prepare($query);
    $statement->bindValue(":username", $username, PDO::PARAM_STR);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row["count"] == "0";
  }

  /**
   * Put a user in the user table.
   */
  function addUser($connection, $username, $email, $cryptedPw, $salt, $get_emails){
    $query = "INSERT INTO users (name, email, password, salt, gets_emails) VALUES (:username, :email, :cryptedPw, :salt, :get_emails)";
    //$query = "INSERT INTO users (name, email, password, salt, gets_emails) VALUES ($username, $email, $cryptedPw, $salt, $get_emails);";
  /* $statement = $connection->prepare($query);
    $statement->bindValue(":username", $username, PDO::PARAM_STR);
    $statement->bindValue(":email", $email, PDO::PARAM_STR);
    $statement->bindValue(":cryptedPw", $cryptedPw, PDO::PARAM_STR);
    $statement->bindValue(":salt", $salt, PDO::PARAM_STR);
    $statement->bindValue(":get_emails", $get_emails, PDO::PARAM_INT); 
    $OK = $statement->execute();

    return $OK;
*/
    try{
      $statement = $connection->prepare($query);
      $statement->bindValue(":username", $username, PDO::PARAM_STR);
      $statement->bindValue(":email", $email, PDO::PARAM_STR);
      $statement->bindValue(":cryptedPw", $cryptedPw, PDO::PARAM_STR);
      $statement->bindValue(":salt", $salt, PDO::PARAM_STR);
      $statement->bindValue(":get_emails", $get_emails, PDO::PARAM_INT);
      $OK = $statement->execute();

    }  catch (Exception $e) {
      $e->getMessage();
    }
    return $OK;  
  }
  

  /**
   * Put the genres of a user in the users_genres table.
   */
  function addGenres($connection, $userid, $genres){
    $query = "INSERT INTO usersgenre (user_id, genre) VALUES (:userid, :genre)";
    $statement = $connection->prepare($query);
    $statement->bindValue(":userid", $userid);
    for ($i = 0; $i < sizeof($genres); $i++){
      $statement->bindValue(":genre", $genres[$i]);
      $OK = $statement->execute();
      if (!$OK){
        return false;
      }
    }
    return true;
  }

  /**
   * Generate an alphanumeric string.
   */
  function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
?>
      <?php

        // A boolean for the validity of the user input
        $valid = true;

        // The message to display
        $message = "";
  
        // Check the user name
        if (!isset($_POST['identifier2']) || strlen($_POST['identifier2']) < 4){
          $valid = false;
          $message .= '<p class="error">Le nom d\'utilisateur est trop court.</p>';
          $lala = $_POST['identifier2'];
          echo "<p>$lala</p>";
        }
        else{
          $username = $_POST['identifier2'];  
        }
  
        // Check the password
        if (!isset($_POST['password2']) || strlen($_POST['password2']) < 8){
          $valid = false;
          $message .= '<p class="error">Le mot de passe est trop court.</p>';
        }
        else{
          $password = $_POST['password2'];
	
          // Check the password confirmation
          if (!isset($_POST['password3']) || $_POST['password3'] != $password){
            $valid = false;
            $message .= '<p class="error">Le mot de passe et sa confirmation ne sont pas identiques.</p>';
          }
        }
  
        // Check the email
        if (!isset($_POST['email']) || !contains('@', $_POST['email']) || !contains('.', $_POST['email'])){
          $valid = false;
          $message .= '<p class="error">L\'email entré est invalide.</p>';
        }
        else{
          $email = $_POST['email'];
        }

        // Check the genres
        if (!isset($_POST['genres']) || sizeof($_POST['genres']) < 2){
          $valid = false;
          $message .= '<p class="error">Le nombre de genres sélectionné est insuffisant.</p>';
        }
        else{
          $genres = $_POST['genres'];
        }

        // Check the availability of the user name
        if ($valid){
          $available = checkUserName($connection, $username);
          if (!$available){
            $valid = false;
            $message .= '<p class="error">Le nom d\'utilisateur '.$username.' est déjà pris.</p>';
          }
        }

        // If everything is good, add the user
        if ($valid){
          echo "<p class=\"succes\">Les champs ont été validés par le serveur.<p/>";
	
          // Salt generation
          $salt = generateRandomString(10);

          // Password encryption
          $cryptedPw = hash('sha384', $password.$salt);
	
          // Gets emails?
          if (isset($_POST['newsletter']) && $_POST['newsletter'] == "on"){
            $get_emails = true;
          }
          else{
            $get_emails = false;
          }

          // Add the user to the database
          $userOK = addUser($connection, $username, $email, $cryptedPw, $salt, $get_emails);
	
          if ($userOK){
            // Add the user genres
            $userid = $connection->lastInsertId();
            $genresOK = addGenres($connection, $userid, $genres);
	
        	  if ($genresOK){
              echo "<p class=\"succes\">L'inscription a été réalisée avec succès.</p>";
              echo '<p><a href="../">Retour vers la page d\'accueil.</a></p>';
            }
          }
        }
  
        // If at least one criterion was not respected, display error messages
        else{
          echo "<p class=\"error\">L'inscription n'a pas pu être réalisée pour les raisons suivantes :</p>";
          echo $message;
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
                            <a href='#navbar'>Back up</a>
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



