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

	<title>Miniblog - Modifier : <?=$billet['titre_billet']?></title>
</head>

<body>
<header class="h-back">
        <h1 class="titre-blog"> <a href="index.php?action=view_back">Administration</a></h1>
        <nav class="hs-right">
            <a href="index.php" class='btn btn btn-bl'>Retourner sur le blog</a>
            <a href="index.php?action=logout" class='btn btn btn-outl'>Se déconnecter</a>
        </nav>
    </header>

	<main class="main-modif">
	<nav class="breadcrumb">
			<ul>
				<li class="link">
					<a href="index.php?action=view_back">Administration</a>
				</li>
				<li class="page-act">
					<p>Modifier : <?=$billet['titre_billet']?></p>
				</li>
			</ul>
		</nav>
		<div class="h-1">
			<h1>Modifier le billet : <?=$billet['titre_billet']?></h1>
		</div>

		<form action="index.php?action=update_billet&id=<?=$billet['id_billet']?>" method="POST"  class="f-log f-mod">
			<div class="f-li">
				<label for="titre">Titre :</label>
				<input type="text" name="titre" id="titre" placeholder="<?=$billet['titre_billet']?>">
			</div>
				<label for="contenu">Contenu :</label>
				<textarea name="contenu" id="contenu" placeholder="<?=$billet['contenu_billet']?>"class="txa-lg"></textarea>
			</div>
			<input type="submit" value="Modifier" class="btn btn-bl f-log-btn-cont">
		</form>
	</main>
	<footer>
		<p>🔨 Miniblog réalisé par <a href="https://lapeyre.butmmi.o2switch.site/" target="_blank"
        rel="noopener noreferrer" class="a-def">Valérie Lapeyre</a>, 2023.</p>
	</footer>
</body>

</html>