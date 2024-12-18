<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root"; // Remplacez par votre nom d'utilisateur
$password = ""; // Remplacez par votre mot de passe
$dbname = "texte_historique"; // Nom de la base de données

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupérer le texte envoyé depuis la page
if (isset($_POST['text'])) {
    $texte = $_POST['text'];

    // Insérer le texte dans la base de données
    $sql = "INSERT INTO historique_textes (texte) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $texte);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>