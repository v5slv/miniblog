<?php
require('model.php');

if (isset($_GET['action']) && $_GET['action'] !== '') {
	switch ($_GET['action']) {
		case 'view_billet':
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$billet=affichageBillet($_GET['id']);
				$commentaire=affichageCommentaire($_GET['id']);
    			require('view_billet.php');
			} else {
				echo 'Erreur : aucun identifiant de billet envoyé';
				die;
			}
			break;

		case 'view_archives':
			$ordre="date_billet DESC";
			$result=affichageTout($ordre);
    		require('view_archives.php');
			break;

		case 'view_login':
			require('view_login.php');
			break;

		case 'login':
			if (isset($_POST['submit'])){
				login($_POST['email'], $_POST['mdp']);
			} else {
				header('Location: index.php?action=view_login&err=bizarre');
				die;
			}
			break;

		case 'view_inscription':
			require('view_inscription.php');
			break;
		
		case 'inscription':
			if (isset($_POST['submit'])) {
				inscription($_POST['pseudo'],$_POST['email'],$_POST['mdp']);
			} else {
				header('Location: index.php?action=view_inscription&err=bizarre');
				die;
			}
			break;

		case 'commentaire':
			if (isset($_GET['id']) && $_GET['id'] !== '') {
				if (!empty($_POST)){
					addCommentaire($_SESSION['id'],$_GET['id'],$_POST['contenu']);
					$billet=affichageBillet($_GET['id']);
					$commentaire=affichageCommentaire($_GET['id']);
    				require('view_billet.php');
				}
				else {
					$billet=affichageBillet($_GET['id']);
					$commentaire=affichageCommentaire($_GET['id']);
    				require('view_billet.php');
				}
				
			} else {
				echo 'Erreur : votre commentaire est invalide';
				die;
			}
			break;

		case 'logout':
			session_destroy();
			header('Location: index.php');
			break;
		
		case 'view_back':
			if ($_SESSION['login']=='admin') {
				if(isset($_GET['tri']) && $_GET['tri']!==''){
					if($_GET['tri']=='id'){
						$ordre="id_billet DESC";
					}
					elseif($_GET['tri']=='titre'){
					$ordre="titre_billet ASC";
					}else {
					$ordre="date_billet DESC";
					}
				} else {
					$ordre="date_billet DESC";
				}
				$result=affichageTout($ordre);
				require('view_back.php');
			} else {
				header('Location: index.php');
			};
			break;
		
		case 'ajout_billet':
			if ($_SESSION['login']=='admin') {
					if (!empty($_POST)){
						addBillet($_POST['titre'],$_POST['contenu']);
					}
					header('Location: index.php?action=view_back');
			} else {
				header('Location: index.php');
			};
		break;

		case 'view_modif':
			if ($_SESSION['login']=='admin'){
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					$billet=affichageBillet($_GET['id']);
					require('view_modif.php');
				} else {
					echo 'Erreur : aucun identifiant de billet envoyé';
					die;
				}
			} else {
				header('Location: index.php');
			};
		break;

		case 'update_billet':
			if ($_SESSION['login']=='admin') {
				$id=$_GET['id'];
				if (!empty($_POST)){
					updateBillet($id,$_POST['titre'],$_POST['contenu']);
				}
				header("Location: index.php?action=view_back");
			} else {
			header('Location: index.php');
			};
		break;

		case 'suppr':
			if ($_SESSION['login']=='admin'){
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					supprimeBillet($_GET['id']);
					header('Location: index.php?action=view_back');
				} else {
					echo 'Erreur : aucun identifiant de billet envoyé';
					die;
				}
			} else {
				header('Location: index.php');
			};
		break;

	}
} 

else {
	$result=affichageAccueil();
    require('view_accueil.php');
}

