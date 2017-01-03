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
					Votre genre de séries :
				</p>

				<div id="genres">
                                <div>
                                  <input type="checkbox" name="genres[]" value="Adventure" <?php if (in_array("Adventure", $genres)) echo "checked" ?>/><label>Aventure</label>
                                  <input type="checkbox" name="genres[]" value="Fantasy" <?php if (in_array("Fantasy", $genres)) echo "checked" ?>/><label>Fantasy</label>
                                  <input type="checkbox" name="genres[]" value="Animation" <?php if (in_array("Animation", $genres)) echo "checked" ?>/><label>Animation</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Drama" <?php if (in_array("Drama", $genres)) echo "checked" ?>/><label>Drama</label>
                                  <input type="checkbox" name="genres[]" value="Horror" <?php if (in_array("Horror", $genres)) echo "checked" ?>/><label>Horror</label>
                                  <input type="checkbox" name="genres[]" value="Action" <?php if (in_array("Action", $genres)) echo "checked" ?>/><label>Action</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Comedy" <?php if (in_array("Comedy", $genres)) echo "checked" ?>/><label>Comedy</label>
                                  <input type="checkbox" name="genres[]" value="History" <?php if (in_array("History", $genres)) echo "checked" ?>/><label>History</label>
                                  <input type="checkbox" name="genres[]" value="Western" <?php if (in_array("Western", $genres)) echo "checked" ?>/><label>Western</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Thriller" <?php if (in_array("Thriller", $genres)) echo "checked" ?>/><label>Thriller</label>
                                  <input type="checkbox" name="genres[]" value="Crime" <?php if (in_array("Crime", $genres)) echo "checked" ?>/><label>Crime</label>
                                  <input type="checkbox" name="genres[]" value="Documentary" <?php if (in_array("Documentary", $genres)) echo "checked" ?>/><label>Documentary</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Science Fiction" <?php if (in_array("Science Fiction", $genres)) echo "checked" ?>/><label>Sci-Fi</label>
                                  <input type="checkbox" name="genres[]" value="Mystery" <?php if (in_array("Mystery", $genres)) echo "checked" ?>/><label>Mystery</label>
                                  <input type="checkbox" name="genres[]" value="Music" <?php if (in_array("Music", $genres)) echo "checked" ?>/><label>Music</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Romance" <?php if (in_array("Romance", $genres)) echo "checked" ?>/><label>Romance</label>
                                  <input type="checkbox" name="genres[]" value="Family" <?php if (in_array("Family", $genres)) echo "checked" ?>/><label>Family</label>
                                  <input type="checkbox" name="genres[]" value="War" <?php if (in_array("War", $genres)) echo "checked" ?>/><label>War</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Action & Adventure" <?php if (in_array("Action & Adventure", $genres)) echo "checked" ?>/><label>Action & Adventure</label>
                                  <input type="checkbox" name="genres[]" value="Kids" <?php if (in_array("Kids", $genres)) echo "checked" ?>/><label>Kids</label>
                                  <input type="checkbox" name="genres[]" value="News" <?php if (in_array("News", $genres)) echo "checked" ?>/><label>News</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Reality" <?php if (in_array("Reality", $genres)) echo "checked" ?>/><label>Reality</label>
                                  <input type="checkbox" name="genres[]" value="Sci-Fi & Fantasy" <?php if (in_array("Sci-Fi & Fantasy", $genres)) echo "checked" ?>/><label>Sci-Fi & Fantasy</label>
                                  <input type="checkbox" name="genres[]" value="Talk" <?php if (in_array("Talk", $genres)) echo "checked" ?>/><label>Talk</label>
                                </div>
                                <div>
                                  <input type="checkbox" name="genres[]" value="Soap" <?php if (in_array("Soap", $genres)) echo "checked" ?>/><label>Soap</label>
                                  <input type="checkbox" name="genres[]" value="War & Politics" <?php if (in_array("War & Politics", $genres)) echo "checked" ?>/><label>War & Politics</label>
                                  <input type="checkbox" name="genres[]" value="TV Movie" <?php if (in_array("TV Movie", $genres)) echo "checked" ?>/><label>TV Movie</label>
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