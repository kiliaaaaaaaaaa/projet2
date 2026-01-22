<?php
session_start();
require_once '../config/auth.php';
require_once 'connexiondb.php';

protegerPage();

if (!isset($_GET['id'])) {
    header('Location: ../dashboard.php');
    exit();
}

$ticket_id = (int)$_GET['id'];


$stmt = $bdd->prepare("SELECT iduser FROM Ticket WHERE id = ?");
$stmt->execute([$ticket_id]);
$ticket = $stmt->fetch();

if (!$ticket) {
    header('Location: ../dashboard.php?error=Ticket introuvable');
    exit();
}

if ($ticket['iduser'] != $_SESSION['user_id'] && !estAdmin()) {
    header('Location: ../dashboard.php?error=Vous n\'avez pas la permission de supprimer ce ticket');
    exit();
}

$stmt = $bdd->prepare("DELETE FROM Ticket WHERE id = ?");
$stmt->execute([$ticket_id]);

if (estAdmin()) {
    header('Location: ../admin.php?success=Ticket supprimé avec succès');
} else {
    header('Location: ../dashboard.php?success=Ticket supprimé avec succès');
}
exit();
?>
