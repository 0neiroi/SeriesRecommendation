<?php
  // Say to the browser that the returned content is a JSON content in UTF-8
  header('content-type: application/json; charset=utf-8');

  // Allow other sites to contact us
  header("Access-Control-Allow-Origin: *");

  // Connect to the database
  require 'base.php';

  // Character encoding of the database
  $connection->exec("SET NAMES 'utf8'");

  // Build query
  $query = "SELECT * FROM series"; 
  
  /*VALERE*/ // ^^^^^^^^^^^^^^^^ 
  //  $query = "SELECT * FROM project FROM series"; hm il faut faire un choix soit series soit project mais pas les deux 0:-) 

  // Sort by name
  if (isset($_GET['sort'])){
    if ($_GET['sort'] == "name"){
      $query .= " ORDER BY name";
    }
  }

  // Send query and get response
  $rows = array();
  foreach($connection->query($query, PDO::FETCH_ASSOC) as $row) {
    $rows[] = $row;
  }

  // Convert to JSON  
  $series = array();
  $series['series'] = $rows;
  echo json_encode($series, JSON_UNESCAPED_SLASHES);
  // Version sans json_encode
  // encode($series);

  function encode($series){
    echo '{"series":[';
    $rows = $series['series'];
    for ($i = 0; $i < sizeof($rows); $i++){
     $row = $rows[$i];
     echo "{\"id\":\"$row[id]\"," .
     "\"backdrop_path\":\"$row[backdrop_path]\"," .
     "\"first_air_date\":\"$row[first_air_date]\",".
     "\"homepage\":\"$row[homepage]\",".
     "\"in_production\":\"$row[in_production]\",".
     "\"last_air_date\":\"$row[last_air_date]\",".
     "\"name\":\"$row[name]\",".
     "\"number_of_episodes\":\"$row[number_of_episodes]\",".
     "\"number_of_seasons\":\"$row[number_of_seasons]\",".
     "\"original_language\":\"$row[original_language]\",".
     "\"original_name\":\"$row[original_name]\",".
     "\"overview\":\"$row[overview]\",".
     "\"popularity\":\"$row[popularity]\",".
     "\"poster_path\":\"$row[poster_path]\",".
     "}";
     if ($i != sizeof($rows) - 1){
       echo ",";
     }
   }
   echo "]}";
  }

  // var_dump($series);

?>