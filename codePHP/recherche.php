<?php
session_start();
include 'connexiondb.php';

if(!empty($_POST['email']) && !empty($_POST['mdp'])){
    $requete = 'SELECT mdp FROM utilisateurs WHERE email = :email';
    $reponse = $bdd->prepare($requete);
    $reponse->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);


    if(password_verify($mdp, $reponse)){
        $estadmin = 'SELECT admins FROM utilisateurs';
        $reponseestadmin = $bdd->prepare($estadmin);
        if($reponseestadmin == 1){
            header('Location: ../dashboard.php');
        }else{
            header('Location: ../cticket.php'); 
        }

    }
}

?>