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

// Charger tous les textes sauvegardés
$sql = "SELECT texte, date_enregistrement FROM historique_textes ORDER BY date_enregistrement DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div><strong>" . $row['date_enregistrement'] . "</strong><br>" . nl2br(htmlspecialchars($row['texte'])) . "</div><hr>";
    }
} else {
    echo "Aucun texte trouvé.";
}

$conn->close();
?>