# Système de Gestion de Tickets d'Incidents Techniques

## Description
Application web de gestion de tickets d'incidents techniques développée avec PHP, MySQL et sessions PHP. Le système permet aux utilisateurs de créer et gérer leurs tickets, et aux administrateurs de visualiser et gérer tous les tickets.

## Technologies utilisées
- **HTML/CSS** : Structure et présentation
- **PHP** : Logique serveur
- **MySQL/MariaDB** : Base de données
- **Sessions PHP** : Authentification
- **PDO** : Requêtes préparées (sécurité anti-injection SQL)
- **password_hash/password_verify** : Hachage sécurisé des mots de passe

## Installation

### 1. Prérequis
- Serveur web (Apache, Nginx, etc.)
- PHP 7.4 ou supérieur
- MySQL/MariaDB
- Extension PDO activée dans PHP

### 2. Configuration de la connexion

La base de données doit déjà exister avec les tables `utilisateurs` et `ticket`.

Modifiez le fichier `codePHP/connexiondb.php` avec vos identifiants de base de données :
```php
$user = 'votre_utilisateur';
$pass = 'votre_mot_de_passe';
```

### 3. Configuration du serveur web

Placez les fichiers dans le répertoire de votre serveur web (ex: `htdocs`, `www`, etc.)

## Utilisation

### Fonctionnalités

#### Pour les utilisateurs :
- Inscription avec pseudo, email et mot de passe
- Connexion sécurisée
- Création de tickets (titre, description)
- Visualisation de ses propres tickets
- Suppression de ses propres tickets

#### Pour les administrateurs :
- Accès à tous les tickets
- Modification du statut des tickets (ouvert/résolu)
- Suppression de tous les tickets
- Visualisation des informations des créateurs de tickets

## Structure du projet

```
projet2-main/
├── config/
│   └── auth.php        # Fonctions d'authentification
├── codePHP/
│   ├── connexiondb.php # Connexion à la base de données
│   ├── inscription.php # Traitement de l'inscription
│   ├── login.php       # Traitement de la connexion
│   ├── creer_ticket.php # Création d'un ticket
│   ├── supprimer_ticket.php # Suppression d'un ticket
│   ├── changer_statut.php # Changement de statut (admin)
│   └── deconnexion.php # Déconnexion
├── css/
│   └── style.css       # Styles CSS
├── index.php           # Page d'inscription
├── connexion.php       # Page de connexion
├── dashboard.php       # Dashboard utilisateur
├── admin.php           # Dashboard administrateur
├── creer_ticket.php    # Formulaire de création de ticket
└── README.md          # Ce fichier
```

## Sécurité

- ✅ Mots de passe hachés avec `password_hash()`
- ✅ Vérification avec `password_verify()`
- ✅ Requêtes préparées PDO (protection contre les injections SQL)
- ✅ Protection des pages privées avec sessions
- ✅ Vérification des rôles pour l'accès admin
- ✅ Validation des données côté serveur
- ✅ Échappement HTML avec `htmlspecialchars()`

## Auteur
Projet réalisé dans le cadre d'un BTS

## Licence
Ce projet est fourni à des fins éducatives.
