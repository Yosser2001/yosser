<?php

$servername = "localhost";  // Nom du serveur MySQL (généralement "localhost")
$username = "root";         // Nom d'utilisateur de la base de données
$password = "";             // Mot de passe de la base de données
$database = "appointments"; // Nom de la base de données

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Définir le jeu de caractères (optionnel)
$conn->set_charset("utf8");
?>
