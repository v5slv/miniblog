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

	<title>Miniblog - Se connecter</title>
</head>

<body>

	<header>
		<h1 class="titre-blog"><a href="index.php">Miniblog</a></h1>
	</header>

	<main class="main-billet">
		<div class="form-cont">

			<h2 class="t-log">Connectez-vous</h3>
			<?php
		if (isset($_GET['err']) && $_GET['err'] !== '') {
			switch ($_GET['err']) {
			 case 'login':
				 echo"<p class='p-e'>Mince ! Vous vous êtes trompé d'adresse mail. Réessayez.</p>";
			 break;
			 case 'mdp':
				echo"<p class='p-e'>Mince ! Vous vous êtes trompé de mot de passe. Réessayez.</p>";
			 break;
			 default:
			 echo"<p class='p-e'>Réessayez ! Remplissez bien le formulaire.</p>";
		 }
		};
		?>

			<form action="index.php?action=login" method="POST" class="f-log">
				<div class="f-li">
					<label for="email" class="form-label">Email :</label>
					<input type="text" name="email" placeholder="Saisir votre email" class="form-control">
				</div>
				<div class="f-li">
					<label for="mdp" class="form-label">Mot de passe :</label>
					<input type="password" name="mdp" placeholder="Saisir votre mot de passe" class="form-control">
				</div>
				<div class="f-log-btn-cont">
					<input type="submit" name="submit" value="Valider" class="btn btn-bl">
				</div>
			</form>

			<p class="text-center">Vous n'avez pas encore de compte ? <a class="a-def-u"
					href="index.php?action=view_inscription">Inscrivez-vous</a> !</p>

		</div>
	</main>

	<footer>
		<p>🔨 Miniblog réalisé par <a href="https://lapeyre.butmmi.o2switch.site/" target="_blank"
        rel="noopener noreferrer" class="a-def">Valérie Lapeyre</a>, 2023.</p>
	</footer>

</body>

</html>