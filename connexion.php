<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
<nav class="navbar">
  <ol>
    <li><a href="#">dashboard</a></li>
    <li><a href="#">inscription</a></li>
    <li>Jump Bike 3000</li>
  </ol>
</nav>
    <h1>connexion</h1>
    <form action="/serveur_kilian/projet2/codePHP/recherche.php" method="post">
        <label for="email"> mail</label>
        <input type="email" id="email" name="email" required="required"><br>
        <label for="mdp">mot de passe</label>
        <input type="password" id="mdp" name="mdp" required="required"><br>
        <button type="submit" >connexion</button>
    </form>
</body>
</html>