<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="style.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

	<link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>📰</text></svg>">

	<title>Miniblog - S'inscrire</title>
</head>

<body>

	<header>
		<h1 class="titre-blog"><a href="index.php">Miniblog</a></h1>
	</header>

	<main class="main-billet">
		<?php
		if (isset($_GET['err']) && $_GET['err'] !== '') {
			echo"<h1>Mince, il y a eu une erreur. Réessayez !</h1>";
		  };
		?>

		<div class="form-cont">

			<h3 class="t-log">Inscrivez-vous</h3>

			<form action="index.php?action=inscription" method="POST" class="f-log">
				<div class="f-li">
					<label for="email" class="form-label">Pseudo :</label>
					<input type="text" name="pseudo" placeholder="Choisir votre pseudo" class="form-control">
				</div>

				<div class="f-li">
					<label for="email" class="form-label">Email :</label>
					<input type="text" name="email" placeholder="Saisir votre email" class="form-control">
				</div>

				<div class="f-li">
					<label for="mdp" class="form-label">Mot de passe :</label>
					<input type="password" name="mdp" placeholder="Choisir votre mot de passe" class="form-control">
				</div>

				<div class="f-log-btn-cont">
					<input type="submit" name="submit" value="Valider" class="btn btn-bl">
				</div>
			</form>

			<p class="text-center">Vous avez déjà un compte ? 
			<a class="a-def-u" href="index.php?action=view_login">Connectez-vous</a> !
			</p>
		</div>
	</main>

	<footer>
		<p>🔨 Miniblog réalisé par <a href="https://lapeyre.butmmi.o2switch.site/" target="_blank"
        rel="noopener noreferrer" class="a-def">Valérie Lapeyre</a>, 2023.</p>
	</footer>

</body>

</html>