<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root"; // À remplacer par ton nom d'utilisateur
$password = ""; // À remplacer par ton mot de passe
$dbname = "yamoevent_db"; // Nom de la base de données

// Création de la connexion
$conn = new mysqli($servername, $username, $password);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Création de la base de données
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Base de données créée avec succès<br>";
} else {
    echo "Erreur de création de la base de données : " . $conn->error . "<br>";
}

// Sélectionner la base de données
$conn->select_db($dbname);

// Création de la table Utilisateur
$sql = "CREATE TABLE IF NOT EXISTS utilisateur (
    id_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    photo VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Utilisateur créée avec succès<br>";
} else {
    echo "Erreur de création de la table utilisateur : " . $conn->error . "<br>";
}

// Création de la table Evenement
$sql = "CREATE TABLE IF NOT EXISTS evenement (
    id_evenement INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    nbre_place INT,
    prix INT,
    date DATE NOT NULL,
    periode TIME,   
    description VARCHAR(255) NOT NULL,
    lieu VARCHAR(255) NOT NULL,
    lien_inscription VARCHAR(255) NOT NULL
    id_utilisateur INT,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Evenement créée avec succès<br>";
} else {
    echo "Erreur de création de la table evenement : " . $conn->error . "<br>";
}

// Création de la table Reservation
$sql = "CREATE TABLE IF NOT EXISTS reservation (
    id_reservation INT AUTO_INCREMENT PRIMARY KEY,
    id_utilisateur INT NOT NULL,
    id_evenement INT NOT NULL,
    date_reservation DATE NOT NULL,
    nombre_places INT NOT NULL,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur),
    FOREIGN KEY (id_evenement) REFERENCES evenement(id_evenement),
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Reservation créée avec succès<br>";
} else {
    echo "Erreur de création de la table reservation : " . $conn->error . "<br>";
}

// Fermeture de la connexion
$conn->close();
?>
