<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function estConnecte() {
    return isset($_SESSION['user_id']);
}

function estAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

function protegerPage() {
    if (!estConnecte()) {
        header('Location: connexion.php');
        exit();
    }
}

function protegerPageAdmin() {
    protegerPage();
    if (!estAdmin()) {
        header('Location: dashboard.php');
        exit();
    }
}
?>
