<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title></title>
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
                        <a href='acceuil.php'>Acceuil<a/>
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
                        <a href=''>S'identifier/S'inscrire</a>
                    </li>
                </ul>
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
                        <img src=<!-- mettre image de la serie--> alt=<!-- titre de la serie--> />     
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
                <img src=<!--recuperer les images de chaque saison--> alt=<!-- saison x--> />
            </div>
        </div>
        <footer class="row">
            <div class='row'>
                <div class='col-lg-4 col-md-6 col-sm-9 col-xs-12'> <p>Desciption du site</p></div>
                <div class='col-lg-2 col-md-6 col-sm-9 col-xs-12' id='plan'><p>Acceuil</br>séries</br>Profil</br> S'identifier/S'inscrire</br>Recherche</p></div>
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
