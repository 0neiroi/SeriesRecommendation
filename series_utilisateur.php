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
        <?php $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', ''); ?>
        <h1><?php
            // on affiche le nom de l'utilisateur a partir de son id transmi a la connection
            $req = $bdd->prepare('SELECT name FROM users WHERE id = ?');
            $req->execute(array($_GET['id']));
            $donnee = $req->fetch();
            echo $donnee;
            ?></h1>
        <p> Vos séries en cours:</p>
        <?php
        // on va chercher le nom des séries que l'utilisateur a vues
        $name = $bdd->prepare('SELECT name FROM series WHERE id=
                 (
                SELECT DISTINCT serie_id FROM seriesseasons WHERE season_id=
                (
                SELECT DISTINCT season_id FROM seasonepisode WHERE episode_id=
                (
                SELECT episode_id FROM usersepisodes WHERE user_id=?
                )
                )
                )');
        $name->execute(execute(array($_GET['id'])));
        $user_id = $_GET['id'];
        if(($donnees = $name->fetch())==FALSE){
            ?>
        <p> Vous n'avez commencé aucune série.</p>
        <?php 
        }else{
            do{
        
     
            //pour chaque série que l'utilisateur regarde on va chercher la saison a laquelle il est et le dernier épisode qu'il a vu.
            $season_max = $bdd->query('SELECT MAX  number FROM seasons WHERE season_id=
                             (
                               SELECT season_id FROM seriesseasons WHERE series_id=
                               (
                               SELECT id FROM series WHERE name=$name
                               )) 
                         AND season_id=
                                (
                                SELECT DISTICT season_id FROM seasonsepisodes WHERE episode_id=
                                (
                                 SELECT episode_id FROM usersepisodes WHERE user_id="' . $user_id . '"))');
            $max_s = $season_max->fetch();

            $episode_max = $bdd->query('SELECT MAX number FROM episodes WHERE id=(SELECT episode_id FROM seasonsepisodes WHERE season_id=
                                            (
                                            SELECT season_id FROM seasons WHERE  number="' . $max_s['number'] . '"
                                            AND id=
                                            (
                                            SELECT season_id FROM seriesseasons WHERE series_id=
                                            (
                                            SELECT id FROM serie WHERE name="' . $donnees['name'] . '"))))
                                        AND id=
                                            (
                                            SELECT episode_id FROM usersepisodes WHERE user_id= "' . $user_id . '"
                                            ');
            $ep_max=$episode_max->fetch();
            ?>
        <p class='col-lg-3 col-md-3 col-sm-3 col-xs-12 col-lg-offset-2 col-sm-offset-2'> Vous en êtes à l'épisodes <?php echo $ep_max['number']?> </p>
        <p class='col-lg-2 col-md-2 col-sm-3 col-xs-12'>de la saison <?php echo $max_s['number']?></p>
        <p class='col-lg-2 col-md-2 col-sm-3 col-xs-12'> de <?php $données['name']?>.</p>
        
        <?php 
            }while ($donnees = $name->fetch());
        }
        $name->closeCursor();
        $season_max->closeCursor();
        $episode_max->closeCursor();?>
        <!-- on créer un formulaire pour que l'utilisateur puisse ajouter ce qu'il a vu dernierement -->
        <form method="post" action="series_utilisateur.php">
            
            <p class='col-lg-2 col-md-2 col-sm-3 col-xs-12 col-lg-offset-2 col-sm-offset-3'>J'ai vu l'épisode <input type='number' name='numepisode'/> </p>
            <p class='col-lg-2 col-md-2 col-sm-3 col-xs-12'>de la saison <input type='number' name='numsaison'/> </p>
            <p class='col-lg-2 col-md-2 col-sm-3 col-xs-12'> de la série <input type='text' name='serie'/></p>
            <p class='col-lg-2 col-md-2 col-sm-3 col-xs-12 col-sm-offset-6'><input type="submit" value="OK"/></p>
            
        </form>
        <?php
        // on verifie si ce qu'il a regardé existe dans la base de données
        $reqserie=$bdd->query('SELECT name FROM serie WHERE name="'.$POST['serie'].'"');
        $reqsaison=$bdd->query('SELECT number FROM season WHERE id=
(SELECT season_id FROM seriesseasons WHERE serie_id =
(SELECT serie_id FROM serie WHERE name="'.$POST['serie'].'")) AND number="'.$POST['numsaison'].'"
');
        $reqepisode=$bdd->query('SELECT number FROM episodes WHERE id=
( SELECT episode_id FROM seasonsepisode WHERE season_id=
(SELECT season_id FROM seriesseasons WHERE serie_id=
(SELECT id FROM serie WHERE name="'.$POST['serie'].'") 
AND season_id=
(SELECT id FROM seasons WHERE number="'.$POST['numsaison'].'"))) 
AND id = "'.$POST['numepisode'].'" 
');
        $repserie=$reqserie->fetchAll();
        $repsaison=$reqsaison->fetchAll();
        $repepisode=$reqepisode->fetchAll();
        if(count($repserie)==0 || count($repsaison)==0 || count($repepisode)==0 ){       
        ?>
        <p>
            Ce que vous cherchez n'existe pas dans la base de données
        </p>
        <?php
        }else{ // si ce qu'il a entré existe on va chercher l'id de l'episode puis on l'ajoute a la table usersepisodes en face de l'id de cet utilisateur
            $episode_id=$bdd->query('SELECT id FROM episode WHERE number="'.$POST['numepisode'].'" AND id=
(SELECT episode_id FROM seasonsepisodes WHERE season_id=
(SELECT season_id FROM seriesseasons WHERE season_id=
( SELECT id FROM seasons WHERE number="'.$POST['numsaison'].'")
 AND serie_id=
(SELECT serie_id FROM series WHERE name="'.$POST['serie'].'")))
');
            $nouvelepisode=$bdd->prepare('INSERT INTO usersepisodes (user_id, episode_id,) VALUES (:user_id,;episode_id');
            $nouvelepisode->execute(array(
                'user_id'=>$user_id,
                'episode_id'=>$episode_id->fetch(),
            ));
        }
        ?>
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
