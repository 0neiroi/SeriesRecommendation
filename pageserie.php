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
        <title></title>

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
            <div class="row" id='navbar'>
                <ul id ='menu'>
                    <li class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
                        <a href='accueil.php'>Accueil<a/>
                    </li>
                    <li class='col-lg-2 col-md-3 col-sm-3 col-xs-6'>
                        <a href=''>Séries</a>
                        <ul>
                            <li><a href="">Action</a></li>
                            <li><a href="">Aventure</a></li>
                            <li><a href="">blablabla</a></li>
                            <li><a href="">...</a></li>
                            <li><a href="">Series a voir</a></li>
                        </ul>
                    </li>
                    <li class='col-lg-2 col-md-3 col-sm-3 col-xs-6'>
                        <a href=''>Profil</a>
                    </li>
                    <li class='col-lg-2 col-md-3 col-sm-3 col-xs-6'>
                        <a href='' data-toggle="modal" data-target="#myModal">S'identifier/S'inscrire</a>
                    </li>
                </ul>


                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
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



                <div class="col-xs-12 col-md-12 col-sm-12 col-lg-4" id="recherche">
                    <form>
                        <input type="text"  value="rechercher"/>
                        <input type="submit" value=""/>
                    </form>
                </div>
            </div>


        </header>

        <div id="corps" class="row">
            <div class="col-lg-9 col-md-9 col-sm-10 col-xs-8 col-xs-12 ">
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-6 col-xs-8">
                        <!--<img src= mettre image de la serie alt= titre de la serie />     -->
                    </div>
                    <div class=" col-lg-8 col-md-7 col-sm-6 col-xs-12">
                        <h1> Titre:</h1>
                        <p>Genre:</p>
                        <p> Producteur:</p>
                        <p> Acteurs:</p>
                        <p>Debut de parution</p>
                        <p>Dernier épisode paru</p>
                        <p>Episodes en cours de produciton</p>
                        <p>Nombre de saisons</p>
                        <p>Nombre d'épisodes</p>
                    </div>       
                </div>
                <div clas="row">
                    <div class="col-lg-10 col-md-10 col-sd-12 col-xs-12 col-lg-offset-2 col-md-offset-2">
                        <p>Synopsis:</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                <!-- <img src=recuperer les images de chaque saison alt= saison x /> -->
            </div>
        </div>
        <footer class="row">
            <div class='row'>
                <div class='col-lg-4 col-md-6 col-sm-9 col-xs-12'> <p>Desciption du site</p></div>
                <div class='col-lg-2 col-md-6 col-sm-9 col-xs-12' id='plan'><p>Accueil</br>séries</br>Profil</br> S'identifier/S'inscrire</br>Recherche</p></div>
                <div class="col-lg-4 col-md-12 col-sm-3 col-xs-12 col-lg-offset-2">
                    <div class='row'>

                        <div class='col-lg-4 col-md-4 col-sm-4 col-xs-4' >
                            <img class='img-responsive' src="img/tw.png"/>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-4 col-xs-4'>
                            <img class="img-responsive"src="img/fb.png"/>
                        </div >
                        <div class='col-lg-4 col-md-4 col-sm-4 col-xs-4'>
                            <img class='img-responsive' src='img/ins.png'/>
                        </div> 
                    </div>
                    <div class='row'>
                        <div class="col-lg-12 col-md-12 col-sd-12 col-xs-12">
                            <a href='#navbar'>Retour en haut de page</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' id="copyright"> 
                        <p>Copyright</p>
                    </div>
                </div>				
        </footer>
    </body>
</html>
