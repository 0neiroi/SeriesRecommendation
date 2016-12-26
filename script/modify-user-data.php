<?php
// Fetch the session values
session_start();
$username = $_SESSION["username"];
$email = $_SESSION["email"];
$gets_emails = $_SESSION["gets_emails"];
$genres = $_SESSION["genres"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Modification des informations</title>
	<charset="UTF-8" />
	<link rel="stylesheet" href="style.css"/>
</head>

<body>
	<div id="global">
		<div class="panel">

			<p>Modifier les informations de <?php echo $username; ?>.</p>

			<!-- Panel to change information -->
			<form action="#" method="post">
				<div id="credentials">
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
						<input type="text" id="email" name="email" value="<?php echo $email; ?>"/>
					</div>
				</div>

				<!-- Newsletter -->
				<div id="newsletterDiv">
					<input type="checkbox" id="newsletter" name="newsletter" <?php if ($gets_emails) echo "checked"; ?> />
					<label for="newsletter">Recevoir des mails de la part du site</label>
				</div>

				<!-- Choice of genres -->
				<p>
					Votre style de musique :
				</p>

				<div id="genres">
					<div>
						<input type="checkbox" name="genres[]" value="blues" <?php if (in_array("blues", $genres)) echo "checked" ?> /><label>Blues</label>
						<input type="checkbox" name="genres[]" value="classic" <?php if (in_array("classic", $genres)) echo "checked" ?> /><label>Classique</label>
						<input type="checkbox" name="genres[]" value="country" <?php if (in_array("country", $genres)) echo "checked" ?> /><label>Country</label>
					</div>
					<div>
						<input type="checkbox" name="genres[]" value="electro" <?php if (in_array("electro", $genres)) echo "checked" ?> /><label>Electro</label>
						<input type="checkbox" name="genres[]" value="hiphop" <?php if (in_array("hiphop", $genres)) echo "checked" ?> /><label>Hip Hop</label>
						<input type="checkbox" name="genres[]" value="jazz" <?php if (in_array("jazz", $genres)) echo "checked" ?> /><label>Jazz</label>
					</div>
					<div>
						<input type="checkbox" name="genres[]" value="metal" <?php if (in_array("metal", $genres)) echo "checked" ?> /><label>Metal</label>
						<input type="checkbox" name="genres[]" value="pop" <?php if (in_array("pop", $genres)) echo "checked" ?> /><label>Pop</label>
						<input type="checkbox" name="genres[]" value="reggae" <?php if (in_array("reggae", $genres)) echo "checked" ?> /><label>Reggae</label>
					</div>
					<div>
						<input type="checkbox" name="genres[]" value="rnb" <?php if (in_array("rnb", $genres)) echo "checked" ?> /><label>RNB</label>
						<input type="checkbox" name="genres[]" value="rock" <?php if (in_array("rock", $genres)) echo "checked" ?> /><label>Rock</label>
						<input type="checkbox" name="genres[]" value="soul" <?php if (in_array("soul", $genres)) echo "checked" ?> /><label>Soul</label>
					</div>
				</div>

				<div id="subscription">
					<input type="submit" value="Sauvegarder"/>
				</div>			
			</form>

		</div>
	</div>
</body>
</html>