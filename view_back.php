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
    <title>Miniblog - Administration</title>
</head>

<body>
    <header class="h-back">
        <h1 class="titre-blog"> <a href="index.php?action=view_back">Administration</a></h1>
        <nav class="hs-right">
            <a href="index.php" class='btn btn btn-bl'>Retourner sur le blog</a>
            <a href="index.php?action=logout" class='btn btn btn-outl'>Se déconnecter</a>
        </nav>
    </header>

    <main class="main-back">
        <div class="b-top">
            <h1 class="h-a">Billets postés</h1>
            <button type="button" id="ajoutbtn" class="btn btn-bl">Ajouter un billet</button>
        </div>

        <table class="b-liste" cellspacing="0">
            <tr>
                <th><a href="index.php?action=view_back&tri=id" class="a-def-u">Ordre de création</a></th>
                <th><a href="index.php?action=view_back&tri=titre" class="a-def-u">Titre</a></th>
                <th>Contenu</th>
                <th><a href="index.php?action=view_back" class="a-def-u">Date de modification</a></th>
                <th>Actions</th>
            </tr>
            <?php
                foreach ($result as $billet) {
                ?>
            <tr>
                <td><?=$billet['id_billet']?></td>
                <td class="b-titre"><?=$billet['titre_billet']?></td>
                <td class="b-contenu"><?=$billet['contenu_billet']?></td>
                <td><?=$billet['date_billet']?></td>
                <td><a href="index.php?action=view_modif&id=<?=$billet['id_billet']?>" class="a-sp a-def-u a-mod">Modifier</a><a href="index.php?action=suppr&id=<?=$billet['id_billet']?>" class="a-def-u a-red">Supprimer</a></td>
            </tr>
            <?php 
                }
            ?>
        </table>

        <div class="aj-cont invisible">
            <form action="index.php?action=ajout_billet" method="POST">
            <button type="button" id="fermebtn" class="a-def-u btn-res">Fermer</button>
                <div>
                    <p class="p-4">Ajouter un billet</p>
                    <div class="f-li">
                        <label for="titre">Titre :</label>
                        <input type="text" name="titre" id="titre">
                    </div>
                        <div class="f-li">
                        <label for="contenu">Contenu :</label>
                        <textarea name="contenu" id="contenu" class="txa-lg"></textarea>
                    </div>
                </div>
                <div class="f-log-btn-cont">
                <input type="submit" value="Ajouter" class="btn btn-bl f-log-btn-cont">
				</div>
                
            </form>
        </div>
    </main>
    <footer>
		<p>🔨 Miniblog réalisé par <a href="https://lapeyre.butmmi.o2switch.site/" target="_blank"
        rel="noopener noreferrer" class="a-def">Valérie Lapeyre</a>, 2023.</p>
	</footer>
</body>

</html>