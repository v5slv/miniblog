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

    <script src="com.js" defer></script>
	
	<title>Miniblog - <?=$billet['titre_billet']?></title>
</head>

<body>

<header class="h-def">
		<div class="hs-left">
			<h1 class="titre-blog"><a href="index.php">Miniblog</a></h1>
			<a href="index.php?action=view_archives" class="a-def">Archives</a>
		</div>
		<div class="hs-right">
		<?php
  if (isset($_SESSION['login'])){
    if($_SESSION['id']=="1"){
		echo"
		<p class='bjr'>Bonjour admin 😼</p>
		<a href='index.php?action=view_back' class='btn btn-bl'>Gérer le site</a>
		<a href='index.php?action=logout' class='btn btn-outl'>Se déconnecter</a>
		";
    }

    else{
		echo"
		<p class='bjr'>Bonjour {$_SESSION['login']} ✨</p>
		<a href='index.php?action=logout' class='btn btn-outl'>Se déconnecter</a>
		";
	}
  }
  else {
	echo"
	<a href='index.php?action=view_login' class='btn btn btn-bl'>Se connecter</a>
	<a href='index.php?action=view_inscription' class='btn btn-outl'>S'inscrire</a>
	";}

			$date_billet=date('d/m/Y', strtotime($billet['date_billet']));
			$heure_billet=date('H:i:s', strtotime($billet['date_billet']));
		?>
		</div>
	</header>

	<main class="main-billet">
	<nav class="breadcrumb">
			<ul>
				<li class="link">
					<a href="index.php">Accueil</a>
				</li>
				<li class="page-act">
					<p><?=$billet['titre_billet']?></p>
				</li>
			</ul>
		</nav>

		<h1 class="h-1"><?=$billet['titre_billet']?></h1>
		<p class="bill-date">posté le <?=$date_billet?> à <?=$heure_billet?></p>
		<p class="bill-contenu-1"><?=nl2br(htmlspecialchars($billet['contenu_billet']))?></p>

		<button type="button" id="btncom" class='btn btn-bl btn-aj'>Commentaires</button>
		
		<div class="com-cont invisible">
				<?php
					if($commentaire){
					foreach ($commentaire as $com) {
					$date_com=date('d/m/Y', strtotime($com['date_commentaire']));
					$heure_com=date('H:i:s', strtotime($com['date_commentaire']));
				?>
					<div class="com">
						<h3><?= htmlspecialchars($com['pseudo']); ?></h3>
						<p class="bill-date">posté le <?=$date_com;?> à <?=$heure_com?></p>
						<p class="com-p"><?= $com['contenu_commentaire']; ?></p>
					</div>
				<?php
					}} else {
						echo "<p>Ce billet n'a pas encore de commentaires.</p>";
					}
				?>
		</div>
			<div class="ajout-com">
				<?php
					if (isset($_SESSION['login'])){
				?>
				<h2>Ajouter un commentaire</h2>
					<form action="index.php?action=commentaire&id=<?=$_GET['id']?>" method="POST">
					<textarea id="default" name="contenu" class="txa-lg">Super post :)</textarea>
					<input type="submit" value="Ajouter" class='btn btn-bl'>
					</form>
				<?php
					} else {
				?>
					<p><a href="index.php?action=view_login" class="a-def-u">Se connecter</a> pour pouvoir ajouter un commentaire !</p>
				<?php
				}
				?>
			</div>
	</main>

	<footer>
		<p>🔨 Miniblog réalisé par <a href="https://lapeyre.butmmi.o2switch.site/" target="_blank"
        rel="noopener noreferrer" class="a-def">Valérie Lapeyre</a>, 2023.</p>
	</footer>

</body>

</html>