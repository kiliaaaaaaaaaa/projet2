<?php
session_start();
require_once 'connexiondb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = trim($_POST['pseudo'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($pseudo) || empty($email) || empty($password)) {
        header('Location: ../index.php?error=Tous les champs sont obligatoires');
        exit();
    }
    
    $stmt = $bdd->prepare("SELECT id FROM utilisateurs WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        header('Location: ../index.php?error=Cet email est déjà utilisé');
        exit();
    }


    $stmt = $bdd->prepare("SELECT id FROM utilisateurs WHERE username = ?");
    $stmt->execute([$pseudo]);
    if ($stmt->fetch()) {
        header('Location: ../index.php?error=Ce pseudo est déjà utilisé');
        exit();
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $bdd->prepare("INSERT INTO utilisateurs (username, email, mdp, admins) VALUES (?, ?, ?, 0)");
    $stmt->execute([$pseudo, $email, $passwordHash]);

    header('Location: ../connexion.php?success=Inscription réussie ! Vous pouvez maintenant vous connecter');
    exit();
} else {
    header('Location: ../index.php');
    exit();
}
?>
