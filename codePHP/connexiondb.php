<?php
//**********Paramètres utilisés par la bdd ************************
$user = 'blaise';
$pass = 'Blaise1234!';
//**********Connexion à la base de données**********************
try
{
 $bdd = new PDO('mysql:host=localhost;dbname=db_gestion_ticket;charset=utf8',
        $user,
        $pass
    );
}
catch(Exception $e)
{
    die('Erreur:'.$e->getMessage());
}
//***************************************************************
echo 'Connexion à la bdd reussie !!!<br>';
?>