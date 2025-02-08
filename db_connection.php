<?php
// db_connection.php

// Informations de connexion à la base de données
$servername = "localhost";  // Nom du serveur
$username = "root";         // Nom d'utilisateur de la base de données
$password = "";             // Mot de passe de la base de données
$dbname = "yamoevent_db";      // Nom de la base de données

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Connexion réussie
//echo "Connexion réussie";
?>
