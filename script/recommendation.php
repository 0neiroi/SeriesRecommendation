<?php
  // on va chercher le nom des séries que l'utilisateur a vues
  $name = $connection->prepare('SELECT DISTINCT series.name,series.poster_path,series.id,genres.names FROM series INNER JOIN seriesseasons ON series.id=seriesseasons.series_id INNER JOIN seasonsepisodes ON seriesseasons.season_id=seasonsepisodes.season_id INNER JOIN usersepisodes ON seasonsepisodes.episode_id=usersepisodes.episode_id INNER JOIN seriesgenres ON series.id=seriesgenres.series_id INNER JOIN genres ON genres.id=seriesgenres.genre_id WHERE user_id=? ORDER BY series.popularity;');
   
  if (isset($_SESSION["username"])){
    $user_id = $_SESSION["id"];
    $name->bindValue(1, $user_id, PDO::PARAM_STR);
    $name->execute();
  	echo '<div class="row">';
  	$j=0;
    if(($donnees = $name->fetch())==FALSE){
      echo "<p> Vous n'avez commencé aucune série.</p>";
    }else{
      do{
        if($j%6==0){
          echo "</div>"; 
          echo '<div class="row">'; 
        }
        echo '<div class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><div class="thumbnail">';
        echo '<a href="seriebis.php?id='.$donnees['id'].'">';
        echo '<img src="https://image.tmdb.org/t/p/w640/'.$donnees['poster_path'].'" alt="'.$donnees['name'].'" style="width:100%">';
        echo '<div class="caption">';
        echo '<p class="saison">'.$donnees['name'].' | Épisode '.$ep_max['MAX(episodes.number)'].' de la saison '.$max_s['MAX(seasons.number)'].'</p>
              </div>
            </a>
          </div>
        </div>';  
        $j++;
      }while ($donnees = $name->fetch());
      $name->closeCursor();
      $season_max->closeCursor();
      $episode_max->closeCursor();
    }
    echo "</div>";
    $name->execute();

    $sql = 'SELECT backdrop_path,series.id,series.name FROM series INNER JOIN seriesgenres ON series.id=seriesgenres.series_id INNER JOIN genres ON seriesgenres.genre_id=genres.id WHERE ';  
    for ($i=0; $i < count($donnees = $name->fetchAll()) ; $i++){
      
      $sql.=" genres.name LIKE \"";
      $sql.=$_SESSION["genres"][$i];
      if($i+1<count($_SESSION["genres"])){$sql.="\" OR ";} 
      else{ 
        $sql.="\";";
      }
  }
?>