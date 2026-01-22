<?php
session_start();
require_once 'config/auth.php';
require_once 'codePHP/connexiondb.php';

protegerPage();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard - Mes Tickets</title>
</head>
<body>
    <nav class="navbar">
        <div class="nav-content">
            <h1>Gestion de Tickets</h1>
            <div class="nav-links">
                <span>Bonjour, <?php echo $_SESSION['pseudo']; ?></span>
                <?php if (estAdmin()): ?>
                    <a href="admin.php">Administration</a>
                <?php endif; ?>
                <a href="codePHP/deconnexion.php">Déconnexion</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="dashboard-header">
            <h2>Mes Tickets</h2>
            <a href="creer_ticket.php" class="btn btn-primary">Créer un nouveau ticket</a>
        </div>

        <?php
        $stmt = $bdd->prepare("SELECT * FROM Ticket WHERE iduser = ? ORDER BY dateCreation DESC");
        $stmt->execute([$_SESSION['user_id']]);
        $tickets = $stmt->fetchAll();

        if (empty($tickets)) {
            echo '<div class="alert alert-info">Vous n\'avez pas encore créé de ticket.</div>';
        } else {
            echo '<div class="tickets-list">';
            foreach ($tickets as $ticket) {
                $statutClass = $ticket['statut'] === 'resolu' ? 'resolu' : 'ouvert';
                echo '<div class="ticket-card ' . $statutClass . '">';
                echo '<div class="ticket-header">';
                echo '<h3>' . $ticket['titre'] . '</h3>';
                $statutDisplay = ($ticket['statut'] === 'resolu') ? 'Résolu' : 'Ouvert';
                echo '<span class="badge badge-' . $statutClass . '">' . $statutDisplay . '</span>';
                echo '</div>';
                echo '<p class="ticket-description">' . nl2br($ticket['description']) . '</p>';
                echo '<div class="ticket-footer">';
                if ($ticket['dateCreation']) {
                    echo '<span class="ticket-date">Créé le ' . date('d/m/Y à H:i', strtotime($ticket['dateCreation'])) . '</span>';
                }
                echo '<a href="codePHP/supprimer_ticket.php?id=' . $ticket['id'] . '" class="btn btn-danger btn-small" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer ce ticket ?\')">Supprimer</a>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
