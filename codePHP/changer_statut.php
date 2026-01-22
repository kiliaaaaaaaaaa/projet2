<?php
session_start();
require_once '../config/auth.php';
require_once 'connexiondb.php';

protegerPageAdmin();

if (!isset($_GET['id']) || !isset($_GET['statut'])) {
    header('Location: ../admin.php?error=Paramètres manquants');
    exit();
}

$ticket_id = (int)$_GET['id'];
$statut = $_GET['statut'];


if (!in_array($statut, ['ouvert', 'resolu'])) {
    header('Location: ../admin.php?error=Statut invalide');
    exit();
}

$stmt = $bdd->prepare("UPDATE Ticket SET statut = ? WHERE id = ?");
$stmt->execute([$statut, $ticket_id]);

header('Location: ../admin.php?success=Statut du ticket mis à jour');
exit();
?>
