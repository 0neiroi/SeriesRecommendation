<!DOCTYPE html>
<html>
<head>
  <title>Enregistrement</title>
  <charset="UTF-8" />
  <link rel="stylesheet" href="style.css"/>
</head>

<body>
  <div id="global">
    <div class="panel">

      <?php
        // Connect to the database
        require('base.php');

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
          echo "<p>Les champs ont été validés par le serveur.<p/>";
	
          // Salt generation
          $salt = generateRandomString(10);

          // Password encryption
          $cryptedPw = hash('sha384', $password.$salt);
	
          // Gets emails?
          if (isset($_POST['newsletter']) && $_POST['newsletter'] == "on"){
            $get_emails = true;
            echo "oui je suis là";
          }
          else{
            echo "oui je suis ici";
            $get_emails = false;
          }

          // Add the user to the database
          $userOK = addUser($connection, $username, $email, $cryptedPw, $salt, $get_emails);
	
          if ($userOK){
            echo "oui je suis perdu";
            // Add the user genres
            $userid = $connection->lastInsertId();
            $genresOK = addGenres($connection, $userid, $genres);
	
        	  if ($genresOK){
              echo "<p>L'inscription a été réalisée avec succès.</p>";
              echo '<p><a href="formular.html">Retour vers la page d\'accueil.</a></p>';
            }
          }else{
            echo "oui je suis vraiment perdu";
          }
        }
  
        // If at least one criterion was not respected, display error messages
        else{
          echo "<p class=\"error\">L'inscription n'a pas pu être réalisée pour les raisons suivantes :</p>";
          echo $message;
          echo '<p><a href="formular.html">Retour vers la page d\'accueil..</a></p>';
        }
      ?>
    </div>
  </div>
</body>
</html>

<!-- PHP functions -->
<?php
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
    $statement = $connection->prepare($query);
    $statement->bindValue(":username", $username, PDO::PARAM_STR);
    $statement->bindValue(":email", $email, PDO::PARAM_STR);
    $statement->bindValue(":cryptedPw", $cryptedPw, PDO::PARAM_STR);
    $statement->bindValue(":salt", $salt, PDO::PARAM_STR);
    $statement->bindValue(":get_emails", $get_emails, PDO::PARAM_INT);
    $OK = $statement->execute();
    echo mysql_error();
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