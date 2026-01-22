<?php
session_start();
require_once 'config/auth.php';
require_once 'codePHP/connexiondb.php';

protegerPageAdmin();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Administration - Tous les Tickets</title>
</head>
<body>
    <nav class="navbar">
        <div class="nav-content">
            <h1>Gestion de Tickets - Administration</h1>
            <div class="nav-links">
                <a href="admin.php">Mon Dashboard</a>
                <span>Bonjour, <?php echo $_SESSION['pseudo']; ?> (Admin)</span>
                <a href="codePHP/deconnexion.php">Déconnexion</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="dashboard-header">
            <h2>Tous les Tickets</h2>
        </div>

        <?php
        $stmt = $bdd->prepare(
            "SELECT t.*, u.username as user_pseudo, u.email as user_email FROM Ticket t JOIN utilisateurs u ON t.iduser = u.id ORDER BY t.dateCreation DESC"
        );
        $stmt->execute();
        $tickets = $stmt->fetchAll();

        if (empty($tickets)) {
            echo '<div class="alert alert-info">Aucun ticket pour le moment.</div>';
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
                echo '<div class="ticket-info">';
                echo '<p><strong>Créé par:</strong> ' . $ticket['user_pseudo'] . ' (' . $ticket['user_email'] . ')</p>';
                if ($ticket['dateCreation']) {
                    echo '<p><strong>Date:</strong> ' . date('d/m/Y à H:i', strtotime($ticket['dateCreation'])) . '</p>';
                }
                echo '</div>';
                echo '<div class="ticket-footer">';
                if ($ticket['statut'] === 'ouvert') {
                    echo '<a href="codePHP/changer_statut.php?id=' . $ticket['id'] . '&statut=resolu" class="btn btn-success btn-small">Marquer comme résolu</a>';
                } else {
                    echo '<a href="codePHP/changer_statut.php?id=' . $ticket['id'] . '&statut=ouvert" class="btn btn-warning btn-small">Rouvrir le ticket</a>';
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
