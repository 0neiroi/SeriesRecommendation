<?php
  // Connect to the database
  require('base.php');

  session_start();
  /**
   * Test if a character $c is in a string $s.
   */

  if(isset($_SESSION['username'])){

  function contains($c, $s){
    for ($i = 0; $i < strlen($s); $i++){
      if ($s[$i] == $c){
        return true;
      }
    }
    return false;
  }
  

  /**
   * Put a user in the user table.
   */
  function updateUser($connection, $email, $cryptedPw, $salt, $get_emails){
    
    if(isset($password2)){
      $query = "UPDATE users (email, password, salt, gets_emails) VALUES ( :email, :cryptedPw, :salt, :get_emails) WHERE name = :username";
      try{
      $statement = $connection->prepare($query);
      $statement->bindValue(":username", $_SESSION['username'], PDO::PARAM_STR);
      $statement->bindValue(":email", $email, PDO::PARAM_STR);
      $statement->bindValue(":cryptedPw", $cryptedPw, PDO::PARAM_STR);
      $statement->bindValue(":salt", $salt, PDO::PARAM_STR);
      $statement->bindValue(":get_emails", $get_emails, PDO::PARAM_INT);
      $OK = $statement->execute();
      
    }  catch (Exception $e) {
      $e->getMessage();
    }
    }else{

      $query = "UPDATE users SET email=:email, gets_emails=:get_emails WHERE name = :username";
      try{
      $statement = $connection->prepare($query);
      $statement->bindValue(":username", $_SESSION['username'], PDO::PARAM_STR);
      $statement->bindValue(":email", $email, PDO::PARAM_STR);
      $statement->bindValue(":get_emails", $get_emails, PDO::PARAM_INT);
      $OK = $statement->execute();
      
    }  catch (Exception $e) {
      $e->getMessage();
    }
    }
    
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
    
    return $OK;  
  }
  

  /**
   * Put the genres of a user in the users_genres table.
   */
  function updateGenres($connection, $userid, $genres){
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

        // A boolean for the validity of the user input
        $valid = true;

        // The message to display
        $message = "";

if (isset($_POST['password2'])&& strlen($_POST['password2']) >= 8){
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

        // If everything is good, add the user
        if ($valid){
          echo "<p class=\"succes\">Les champs ont été validés par le serveur.<p/>";
          if (isset($password2)){
            // Salt generation
          $salt = generateRandomString(10);


          // Password encryption
          $cryptedPw = hash('sha384', $password.$salt);
  

          }
          
          // Gets emails?
          if (isset($_POST['newsletter']) && $_POST['newsletter'] == "on"){
            $get_emails = true;
          }
          else{
            $get_emails = false;
          }

          // Add the user to the database
          if (isset($password2)){
            $userOK = updateUser($connection, $email, $cryptedPw, $salt, $get_emails);
          
          }else {

            $userOK = updateUser($connection, $email, '', '', $get_emails);  
          }           
          
  
          if ($userOK){
            // Add the user genres
            $sql4 = 'SELECT id FROM users WHERE name = ?;';

            // on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
            $req4 = $connection->prepare($sql4); 

            //$idurl = $_GET['id']; 
            $req4->bindValue(1, $_SESSION['username'], PDO::PARAM_STR);
            $req4->execute();
            $ligne2 = $req4->fetch();

            $userid = $ligne2['id'];
            $genresOK = updateGenres($connection, $userid, $genres);
  
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



  }
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      ?>