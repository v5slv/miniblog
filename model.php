<?php
session_start();
function dbConnect(){
    $db=new PDO('mysql:host=localhost;dbname=miniblog;port=3306;charset=utf8','root', '');
    return $db;
};

function affichageAccueil(){
    $db=dbConnect();
    $requete="SELECT * FROM billets ORDER BY date_billet DESC LIMIT 3";
    $stmt=$db->query($requete);
    $result=$stmt->fetchall(PDO::FETCH_ASSOC);
    return $result;
};

function affichageTout($ordre){
    $db=dbConnect();
    $requete="SELECT * FROM billets ORDER BY $ordre";
    $stmt=$db->query($requete);
    $result=$stmt->fetchall(PDO::FETCH_ASSOC);
    return $result;
};

function affichageBillet($id){
    $db=dbConnect();
    $requete="SELECT * FROM billets WHERE id_billet=$id";
    $stmt=$db->query($requete);
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function inscription($pseudo,$email,$mdp){
    $db=dbConnect();
    $requete= "INSERT INTO utilisateurs VALUES (NULL,:pseudo,:email,:mdp)";

    $stmt= $db->prepare($requete);
    $stmt->bindParam(':pseudo',$pseudo , PDO::PARAM_STR); 
    $stmt->bindParam(':email',$email , PDO::PARAM_STR); 

    $hash= password_hash($mdp, PASSWORD_DEFAULT);
    $stmt->bindParam(':mdp', $hash , PDO::PARAM_STR); 
    $stmt->execute();
    $_SESSION["login"]=$pseudo;

    $db->query('SET NAMES utf8');
    $requete2= "SELECT * FROM utilisateurs WHERE email=:emailverif";
    $stmt=$db->prepare($requete2);
    $stmt->bindParam(':emailverif',$email , PDO::PARAM_STR);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);

    $_SESSION["id"] = $result["id_utilisateur"];
    header("Location:index.php");
};

function login($email,$mdp){
    $db=dbConnect();
    $db->query('SET NAMES utf8');
    $requete="SELECT * FROM utilisateurs WHERE email=:email";

    $stmt=$db->prepare($requete);
    $stmt->bindParam(':email',$email , PDO::PARAM_STR);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);

    if ($result){
        if(password_verify($mdp, $result["mdp"])){
            $_SESSION["login"]=$result["pseudo"];
            $_SESSION["id"] = $result["id_utilisateur"];
            header("Location:index.php");
        }
        else {
            header("Location:index.php?action=view_login&err=mdp");
        }
    
    } else {
        header("Location:index.php?action=view_login&err=login");
    }
        
};

function addCommentaire($id_user,$id_billet,$contenu){
    $db=dbConnect();
    $requete= "INSERT INTO commentaires VALUES (NULL,:ext_user,:ext_billet, :contenu_commentaire, NOW())";

    $stmt= $db->prepare($requete);
    $stmt->bindParam(':ext_user',$id_user , PDO::PARAM_STR); 
    $stmt->bindParam(':ext_billet',$id_billet , PDO::PARAM_STR); 
    $stmt->bindParam(':contenu_commentaire',$contenu , PDO::PARAM_STR); 
    $stmt->execute();
};

function affichageCommentaire($id_billet){
    $db=dbConnect();
    $requete = "SELECT * FROM commentaires INNER JOIN utilisateurs ON id_utilisateur=ext_utilisateur AND ext_billet=$id_billet ORDER BY date_commentaire DESC";
    
    $stmt=$db->query($requete);
    $result=$stmt->fetchall(PDO::FETCH_ASSOC);
    return $result;
};

function addBillet($titre,$contenu){
    $db=dbConnect();
    $requete= "INSERT INTO billets VALUES (NULL, :titre_billet, NOW(), :contenu_billet)";

    $stmt= $db->prepare($requete);
    $stmt->bindParam(':titre_billet',$titre , PDO::PARAM_STR); 
    $stmt->bindParam(':contenu_billet',$contenu , PDO::PARAM_STR); 
    $stmt->execute();
}

function updateBillet($id,$titre,$contenu){
    $db=dbConnect();
    $requete= "UPDATE billets SET titre_billet=:titre_billet, date_billet=NOW(), contenu_billet=:contenu_billet WHERE id_billet=$id";

    $stmt= $db->prepare($requete);
    $stmt->bindParam(':titre_billet',$titre , PDO::PARAM_STR); 
    $stmt->bindParam(':contenu_billet',$contenu , PDO::PARAM_STR); 
    $stmt->execute();
}

function supprimeBillet($id){
    $db=dbConnect();
    $requete= "DELETE FROM billets
    WHERE id_billet =  $id";

    $stmt= $db->prepare($requete);
    $stmt->execute();
}
