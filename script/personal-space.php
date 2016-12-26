<?php
// Connect to the database
require('base.php');

// Start session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Espace personel</title>
	<charset="UTF-8" />
	<link rel="stylesheet" href="style.css"/>
</head>

<body>
	<div id="global">
		<div class="panel">

			<?php
			// If a username has been submitted, check username and password
			if (isset($_POST["identifier1"])){
		    	// Check username and password
				$username = $_POST['identifier1'];
				$password = $_POST['password1'];

			 	// Check username and password
				$query = "SELECT salt,password FROM users WHERE name=:username";
				$statement = $connection->prepare($query);
				$statement->bindValue(":username", $username, PDO::PARAM_STR);
				$statement->execute();
				$row = $statement->fetch(PDO::FETCH_ASSOC);

				// If successful, add the username to a session variable
				if ($row && $row['password'] == hash('sha384', $password.$row['salt'])) {
					$_SESSION["username"] = $username;
				}
			}

			// If the user is connected (has a session), display the corresponding information
			if (isset($_SESSION["username"])){
				$username = $_SESSION["username"];
				
				// Get email information and display
				$query1 = "SELECT email, gets_emails FROM users WHERE name=:username";
				$statement1 = $connection->prepare($query1);
				$statement1->bindValue(":username", $username, PDO::PARAM_STR);
				$statement1->execute();
				$row1 = $statement1->fetch(PDO::FETCH_ASSOC);
				$email = $row1['email'];
				$gets_emails = $row1['gets_emails'];
				echo "<p>Informations de $username :</p>";
				echo "<p>Adresse email : $email</p>";
				if ($gets_emails){
					echo "<p>Reçoit des emails de la part du site.</p>";
				}
				else{
					echo "<p>Ne reçoit pas d'emails de la part du site.</p>";
				}

				// Get genre information and display
				echo "<div>Genres favoris :";
				echo "<ul>";
				$query2 = "SELECT genre FROM users, users_genres WHERE users.user_id = users_genres.user_id AND users.name=:username";
				$statement2 = $connection->prepare($query2);
				$statement2->bindValue(":username", $username, PDO::PARAM_STR);
				$statement2->execute();
				$rows = $statement2->fetchAll();
				$genres = array();
				for ($i = 0; $i < sizeof($rows); $i++){
					$row2 = $rows[$i];
					$genres[$i] = $row2['genre'];
					echo "<li>".$row2['genre']."</li>";
				}
				echo "</ul></div>";
				echo "<p><a href='modify-user-data.php'>Modifier les informations</a></p>";

				// Save everything in session variables
				$_SESSION["email"] = $email;
				$_SESSION["gets_emails"] = $gets_emails;
				$_SESSION["genres"] = $genres;
			}

			// If no username variable in the session, authentication error
			else{
				echo "<p class='error'>Erreur d'authentification. Retournez sur la page d'accueil et essayez à nouveau de nous connecter.</p>";
				echo '<p><a href="formular.html">Retour vers la page d\'accueil..</a></p>';
			}
			?>
		</div>
	</div>
</body>
</html>