<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Connexion - Gestion de Tickets</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>CONNEXION</h2>
            <hr>
            
            <form action="codePHP/login.php" method="POST">
                <div class="form-group">
                    <label for="email">Adresse Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
            
            <p class="link-text">Vous n'avez pas de compte ? <a href="index.php">S'inscrire</a></p>
        </div>
    </div>
</body>
</html>
