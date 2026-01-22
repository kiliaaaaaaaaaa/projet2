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
    <title>Créer un Ticket</title>
</head>
<body>
    <nav class="navbar">
        <div class="nav-content">
            <h1>Gestion de Tickets</h1>
            <div class="nav-links">
                <a href="dashboard.php">Dashboard</a>
                <?php if (estAdmin()): ?>
                    <a href="admin.php">Administration</a>
                <?php endif; ?>
                <a href="codePHP/deconnexion.php">Déconnexion</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="form-container">
            <h2>Créer un nouveau ticket</h2>
            <hr>
            
            <form action="codePHP/creer_ticket.php" method="POST">
                <div class="form-group">
                    <label for="titre">Titre du ticket</label>
                    <input type="text" id="titre" name="titre" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="6" required></textarea>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Créer le ticket</button>
                    <a href="dashboard.php" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
