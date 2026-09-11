# Application de Gestion Scolaire

Application web de gestion scolaire développée en PHP natif avec une architecture orientée objet, PDO et MySQL.

Le projet permet à un administrateur de gérer les étudiants, les enseignants et les paiements depuis une interface d'administration protégée par authentification.

## Fonctionnalités

### Authentification

- Connexion par email et mot de passe
- Vérification des identifiants
- Création de session
- Protection des pages internes
- Déconnexion

### Tableau de bord

- Nombre total d'étudiants
- Nombre total d'enseignants
- Nombre total de paiements
- Affichage des étudiants récents
- Affichage des enseignants récents
- Affichage des paiements récents
- Accès aux différents modules de gestion

### Gestion des étudiants

- Ajouter un étudiant
- Consulter les informations d'un étudiant
- Modifier un étudiant
- Supprimer un étudiant
- Rechercher par prénom, nom ou email
- Gestion du statut

### Gestion des enseignants

- Ajouter un enseignant
- Consulter les informations d'un enseignant
- Modifier un enseignant
- Supprimer un enseignant
- Rechercher par prénom, nom ou spécialité
- Gestion du statut

### Gestion des paiements

- Ajouter un paiement
- Consulter un paiement
- Modifier un paiement
- Supprimer un paiement
- Rechercher par référence ou étudiant
- Filtrer par statut
- Filtrer par période
- Association d'un paiement à un étudiant
- Gestion du moyen de paiement

## Technologies utilisées

- PHP 8+
- PHP natif
- Programmation orientée objet
- MySQL
- PDO
- HTML5
- CSS3
- JavaScript natif
- Font Awesome
- Git
- GitHub
- Wamp

Aucun framework PHP n'est utilisé dans ce projet.

## Architecture

gestion-scolaire/
├── config/
│ ├── database.php
│ └── auth.php
├── controllers/
│ ├── AuthController.php
│ ├── AdminDashboardController.php
│ ├── StudentController.php
│ ├── TeacherController.php
│ └── PaymentController.php
├── database/
│ ├── database.sql
│ └── seed.php
├── models/
│ ├── User.php
│ ├── Student.php
│ ├── Teacher.php
│ └── Payment.php
├── views/
│ ├── auth/
│ ├── dashboard/
│ ├── students/
│ ├── teachers/
│ ├── payments/
│ └── welcome.php
├── public/
│ ├── css/
│ └── index.php
├── .gitignore
└── README.md

## Architecture de l'application

L'application suit une organisation inspirée du modèle MVC.

### Models

Les modèles assurent l'accès aux données et les opérations avec la base de données.

### Controllers

Les contrôleurs reçoivent les requêtes, effectuent les traitements nécessaires et transmettent les données aux vues.

### Views

Les vues sont responsables de l'affichage de l'interface utilisateur.

### Routes

Le fichier `routes/web.php` associe les différentes URLs aux méthodes des contrôleurs.

## Base de données

La base de données utilise quatre tables principales :

users
students
teachers
payments

La relation principale est :

students 1 ─────────── N payments

Un étudiant peut donc avoir plusieurs paiements.

Le fichier `database/database.sql` contient :

- la création de la base de données
- la structure des tables
- les relations entre les tables
- un compte administrateur de démonstration
- des données de démonstration

## Installation

### 1. Cloner le projet

git clone URL_DU_DEPOT
cd school-management

### 2. Créer la base de données

Ouvrir phpMyAdmin ou un client MySQL puis importer :

database/database.sql

Le fichier crée automatiquement la base :

school_management

### 3. Configurer la connexion à la base de données

Ouvrir :

config/database.php

Puis adapter les paramètres :

$host = '127.0.0.1';
$dbname = 'school_management';
$username = 'root';
$password = '';

Les valeurs dépendent de l'environnement local utilisé.

### 4. Lancer l'application

Avec le serveur PHP intégré :

php -S localhost:8000 -t public

Puis ouvrir :

http://localhost:8000

Avec un environnement comme WAMP, le projet peut également être placé dans le répertoire approprié du serveur local.

## Compte administrateur de démonstration

Email : admin@school.test
Mot de passe : admin123

Ces identifiants sont uniquement destinés à la démonstration du projet.

## Sécurité

Le projet met en œuvre plusieurs bonnes pratiques :

- Requêtes préparées avec PDO
- Protection contre les injections SQL
- `password_hash()` pour le stockage des mots de passe
- `password_verify()` pour la vérification des mots de passe
- Sessions PHP pour l'authentification
- Validation côté serveur
- Échappement des données affichées
- Protection des pages internes par authentification

## JavaScript

Le projet utilise du JavaScript natif pour certaines interactions côté client.

Exemple :

- affichage et masquage du mot de passe sur la page de connexion

Aucune bibliothèque JavaScript ou framework frontend n'est nécessaire.

## Données de démonstration

Le fichier :

database/seed.php

permet également de créer le compte administrateur de démonstration.

L'exécution du script vérifie au préalable si le compte existe déjà afin d'éviter une duplication.

## Git

Le projet est versionné avec Git.

Les fichiers temporaires, dépendances locales et configurations propres à l'environnement de développement sont exclus du dépôt grâce au fichier `.gitignore`.

## Objectif pédagogique

Ce projet a été réalisé dans le but de mettre en pratique :

- PHP orienté objet
- PDO
- MySQL
- architecture MVC
- authentification par session
- opérations CRUD
- relations entre tables
- validation des données
- organisation d'un projet PHP natif
- utilisation de Git et GitHub
