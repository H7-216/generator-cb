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

// Charger l'historique des textes
$sql = "SELECT texte, date_enregistrement FROM historique_textes ORDER BY date_enregistrement DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div><strong>" . $row['date_enregistrement'] . "</strong><br>" . nl2br(htmlspecialchars($row['texte'])) . "</div><hr>";
    }
} else {
    echo "Aucun texte trouvé.";
}

$conn->close();
?>