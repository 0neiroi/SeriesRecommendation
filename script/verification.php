<?php
        require 'base.php';
        // on verifie si ce qu'il a regardé existe dans la base de données
        $reqserie = "SELECT name FROM series WHERE name=:serie;";
        $reqserie=$connection->prepare($reqserie);

        $querysaison = "SELECT number FROM seasons INNER JOIN seriesseasons ON seasons.id = seriesseasons.season_id INNER JOIN series ON seriesseasons.series_id=series.id WHERE series.name=:serie AND number=:numsaison;";
        $reqsaison=$connection->prepare($querysaison);

        $queryepisode="SELECT number FROM episodes INNER JOIN seasonsepisodes ON episodes.id=seasonsepisodes.episode_id INNER JOIN seriesseasons ON seasonsepisodes.season_id=seriesseasons.season_id INNER JOIN series ON seriesseasons.series_id=series.id WHERE series.name=:serie AND number=:numsaison AND episodes.number=:numepisode;";
        $reqepisode=$connection->prepare($queryepisode);

        $reqserie->bindValue(":serie", $_POST['serie'], PDO::PARAM_STR);
        $reqserie->execute();
        print_r ($reqserie-> errorInfo ()); 
        $repserie=$reqserie->fetchAll();

        $reqsaison->bindValue(":serie", $_POST['serie'], PDO::PARAM_STR);
        $reqsaison->bindValue(":numsaison", $_POST['numsaison'], PDO::PARAM_STR);
        $reqsaison->execute();
        print_r ($reqsaison-> errorInfo ()); 
        $repsaison=$reqsaison->fetchAll();

        $reqepisode->bindValue(":serie", $_POST['serie'], PDO::PARAM_STR);
        $reqepisode->bindValue(":numsaison", $_POST['numsaison'], PDO::PARAM_STR);
        $reqepisode->bindValue(":numepisode", $_POST['numepisode'], PDO::PARAM_STR);
        $reqepisode->execute();
        print_r ($reqepisode-> errorInfo ());
        $repepisode=$reqepisode->fetchAll();

        if(count($repserie)==0 || count($repsaison)==0 || count($repepisode)==0 ){       
        
        echo "<p>Ce que vous cherchez n'existe pas dans la base de données</p>";
        
        }else{ // si ce qu'il a entré existe on va chercher l'id de l'episode puis on l'ajoute a la table usersepisodes en face de l'id de cet utilisateur
            $query = "SELECT episodes.id FROM episodes INNER JOIN seasonsepisodes ON seasonsepisodes.episode_id=episodes.id INNER JOIN seasons ON seasonsepisodes.season_id=seasons.id INNER JOIN seriesseasons ON seasons.id=seriesseasons.season_id INNER JOIN series ON series.id = seriesseasons.series_id WHERE episodes.number=:numepisode AND seasons.number=:numsaison AND series.name=:serie;";
            $episode_id=$connection->prepare($query);
            $episode_id->bindValue(":serie", $_POST['serie'], PDO::PARAM_STR);
            $episode_id->bindValue(":numsaison", $_POST['numsaison'], PDO::PARAM_STR);
            $episode_id->bindValue(":numepisode", $_POST['numepisode'], PDO::PARAM_STR);
            $episode_id->execute();
            print_r ($episode_id-> errorInfo ());
            $repepisode_id=$episode_id->fetch();

            $nouvelepisode=$connection->prepare('INSERT INTO usersepisodes (user_id, episode_id) VALUES (:user_id,:repepisode_id);');
            $nouvelepisode->bindValue(":user_id", $_GET['id'], PDO::PARAM_STR);
            $nouvelepisode->bindValue(":repepisode_id", $repepisode_id[0], PDO::PARAM_STR);
            $nouvelepisode->execute();
            print_r ($nouvelepisode-> errorInfo ());

        }
?>