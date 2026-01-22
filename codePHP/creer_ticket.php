<?php
session_start();
require_once '../config/auth.php';
require_once 'connexiondb.php';

protegerPage();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = trim($_POST['titre'] ?? '');
    $description = trim($_POST['description'] ?? '');
    
    if (empty($titre) || empty($description)) {
        header('Location: ../creer_ticket.php?error=Tous les champs sont obligatoires');
        exit();
    }
    
    $stmt = $bdd->prepare("INSERT INTO Ticket (iduser, titre, description, statut, dateCreation) VALUES (?, ?, ?, 'ouvert', NOW())");
    $stmt->execute([$_SESSION['user_id'], $titre, $description]);

    header('Location: ../dashboard.php?success=Ticket créé avec succès');
    exit();
} else {
    header('Location: ../creer_ticket.php');
    exit();
}
?>





