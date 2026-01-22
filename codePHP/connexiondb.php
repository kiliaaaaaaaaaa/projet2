<?php
$user = 'blaise';
$pass = 'Blaise1234!';
$bdd = new PDO('mysql:host=localhost;dbname=db_gestion_ticket;charset=utf8', $user, $pass);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>