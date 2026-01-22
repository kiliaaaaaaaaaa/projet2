<?php
session_start();
require_once 'connexiondb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($email) || empty($password)) {
        header('Location: ../connexion.php?error=Tous les champs sont obligatoires');
        exit();
    }
    
    $stmt = $bdd->prepare("SELECT id, username, email, mdp, admins FROM utilisateurs WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['mdp'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['pseudo'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = ($user['admins'] == 1) ? 'admin' : 'user';

        if ($user['admins'] == 1) {
            header('Location: ../admin.php');
        } else {
            header('Location: ../dashboard.php');
        }
        exit();
    }

    header('Location: ../connexion.php?error=Email ou mot de passe incorrect');
    exit();
} else {
    header('Location: ../connexion.php');
    exit();
}
?>
