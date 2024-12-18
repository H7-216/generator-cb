<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";  // Votre nom d'utilisateur
$password = "";  // Votre mot de passe
$dbname = "texte_historique";  // Nom de votre base de données

// Connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Vérifier si le texte est envoyé
if (isset($_POST['text'])) {
    $texte = $_POST['text'];

    // Insérer le texte dans la base de données
    $sql = "INSERT INTO historique_textes (texte) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $texte);
    $stmt->execute();
    $stmt->close();

    echo "Texte sauvegardé.";
} else {
    echo "Aucun texte envoyé.";
}

$conn->close();
?>