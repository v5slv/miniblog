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

	<script src="coupe.js" defer></script>
	<title>Miniblog</title>
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
	";
  }?>
  </div>
	</header>

	<main class="main-par-defaut">
		<p class="p-3">~ Les 3 derniers billets ajoutés :</p>
		<div class="bill-3">
			<?php
			foreach ($result as $billet) {
			$date=date('d/m/Y', strtotime($billet['date_billet']));
			$heure=date('H:i:s', strtotime($billet['date_billet']));
			?>
			<div class="bill">
				<h3 class="bill-titre">
					<a
						href="index.php?action=view_billet&id=<?= urlencode($billet['id_billet']) ?>"><?= htmlspecialchars($billet['titre_billet']); ?></a>
				</h3>
				<p class="bill-date"> le <?= $date;?> à <?= $heure;?></p>
				<p class="bill-contenu">
					<?= nl2br(htmlspecialchars($billet['contenu_billet'])); ?>
				</p>
				<a href="index.php?action=view_billet&id=<?= urlencode($billet['id_billet']) ?>" class="a-suite">Lire la suite ></a>
			</div>
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