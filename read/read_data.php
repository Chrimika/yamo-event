<?php
// Inclure le fichier de connexion à la base de données
include 'db_connection.php';

// Créer un objet pour stocker les données
$response = new stdClass();

// Récupérer les utilisateurs
$sql = "SELECT * FROM utilisateur";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $utilisateurs = [];
    while ($row = $result->fetch_assoc()) {
        $utilisateur = new stdClass();
        $utilisateur->id = $row['id_utilisateur'];
        $utilisateur->nom = $row['nom'];
        $utilisateur->email = $row['email'];
        $utilisateur->photo = $row['photo'];
        $utilisateurs[] = $utilisateur;
    }
    $response->utilisateurs = $utilisateurs;
} else {
    $response->utilisateurs = [];
}

// Récupérer les événements
$sql = "SELECT * FROM evenement";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $evenements = [];
    while ($row = $result->fetch_assoc()) {
        $evenement = new stdClass();
        $evenement->id = $row['id_evenement'];
        $evenement->titre = $row['titre'];
        $evenement->nbr_places = $row['nbr_places'];
        $evenement->prix = $row['prix'];
        $evenement->date_evenement = $row['date_evenement'];
        $evenement->periode = $row['periode'];
        $evenement->description = $row['description'];
        $evenement->lieu = $row['lieu'];
        $evenement->lien_inscription = $row['lien_inscription'];
        $evenement->id_utilisateur = $row['id_utilisateur'];
        $evenements[] = $evenement;
    }
    $response->evenements = $evenements;
} else {
    $response->evenements = [];
}

// Récupérer les réservations
$sql = "SELECT * FROM reservation";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $reservations = [];
    while ($row = $result->fetch_assoc()) {
        $reservation = new stdClass();
        $reservation->id_reservation = $row['id_reservation'];
        $reservation->id_utilisateur = $row['id_utilisateur'];
        $reservation->id_evenement = $row['id_evenement'];
        $reservation->date_reservation = $row['date_reservation'];
        $reservation->nombre_places = $row['nbr_places'];
        $reservations[] = $reservation;
    }
    $response->reservations = $reservations;
} else {
    $response->reservations = [];
}

// Fermer la connexion à la base de données
$conn->close();

// Retourner les données au format JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
