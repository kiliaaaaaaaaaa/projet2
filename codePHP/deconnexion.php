<?php
session_start();

$_SESSION = array();

session_destroy();

header('Location: ../connexion.php?success=Vous avez été déconnecté avec succès');
exit();
?>
