<?php
        require 'base.php';
        // on verifie si ce qu'il a regardé existe dans la base de données
        $reqserie=$connection->prepare('SELECT name FROM serie WHERE name="'.$_POST['serie'].'"');
        $reqsaison=$connection->prepare('SELECT number FROM season WHERE id=
(SELECT season_id FROM seriesseasons WHERE serie_id =
(SELECT serie_id FROM serie WHERE name="'.$_POST['serie'].'")) AND number="'.$_POST['numsaison'].'"
');
        $reqepisode=$connection->prepare('SELECT number FROM episodes WHERE id=
( SELECT episode_id FROM seasonsepisode WHERE season_id=
(SELECT season_id FROM seriesseasons WHERE serie_id=
(SELECT id FROM serie WHERE name="'.$_POST['serie'].'") 
AND season_id=
(SELECT id FROM seasons WHERE number="'.$_POST['numsaison'].'"))) 
AND id = "'.$_POST['numepisode'].'" 
');     

        $reqserie->execute();
        $repserie=$reqserie->fetchAll();
        $reqsaison->execute();
        $repsaison=$reqsaison->fetchAll();
        $reqepisode->execute();
        $repepisode=$reqepisode->fetchAll();
        if(count($repserie)==0 || count($repsaison)==0 || count($repepisode)==0 ){       
        
        echo "<p>Ce que vous cherchez n'existe pas dans la base de données</p>";
        
        }else{ // si ce qu'il a entré existe on va chercher l'id de l'episode puis on l'ajoute a la table usersepisodes en face de l'id de cet utilisateur
            $episode_id=$connection->query('SELECT id FROM episode WHERE number='.$_POST['numepisode'].' AND id=
                (SELECT episode_id FROM seasonsepisodes WHERE season_id=
                (SELECT season_id FROM seriesseasons WHERE season_id=
                (SELECT id FROM seasons WHERE number='.$_POST['numsaison'].') AND serie_id=
                (SELECT serie_id FROM series WHERE name='.$_POST['serie'].')
                )
                );');
            $nouvelepisode=$connection->prepare('INSERT INTO usersepisodes (user_id, episode_id,) VALUES (:user_id,;episode_id');
            $nouvelepisode->execute(array(
                'user_id'=>$user_id,
                'episode_id'=>$episode_id->fetch(),
            ));
        }
?>