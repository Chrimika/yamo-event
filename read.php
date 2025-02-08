<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root"; // À remplacer par ton nom d'utilisateur
$password = ""; // À remplacer par ton mot de passe
$dbname = "yamoevent_db"; // Nom de la base de données

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Lire les données de la table Utilisateur
$sql = "SELECT * FROM utilisateur";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Afficher chaque ligne de résultat
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id_utilisateur"]. " - nom: " . $row["nom"]." - email: " . $row["email"]. " - photo: " . $row["photo"] ."<br>";
    }
} else {
    echo "0 résultats pour la table Utilisateur.<br>";
}

// Lire les données de la table Evenement
$sql = "SELECT * FROM evenement";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Afficher chaque ligne de résultat
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id_evenement"]. " - Titre de l'événement: " . $row["titre"]. " - Date: " . $row["date"]. "<br>";
    }
} else {
    echo "0 résultats pour la table Evenement.<br>";
}

// Lire les données de la table Reservation
$sql = "SELECT * FROM reservation";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Afficher chaque ligne de résultat
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id_reservation"]. " - Utilisateur ID: " . $row["id_utilisateur"]. " - Événement ID: " . $row["id_evenement"]. " - Date: " . $row["date_reservation"]. " - Nombre de places: " . $row["nombre_places"]. "<br>";
    }
} else {
    echo "0 résultats pour la table Reservation.<br>";
}

// Fermeture de la connexion
$conn->close();
?>
