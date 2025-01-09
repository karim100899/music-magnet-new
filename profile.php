<?php
session_start();
include('config.php');

// Controleer of de gebruiker ingelogd is
if (!isset($_SESSION['email']) && !isset($_SESSION['gebruikersnaam'])) {
    header('Location: login.php');
    exit();
}

// Haal de 'user_id' op uit de URL, als die er is, anders gebruik de ingelogde gebruiker
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Haal de gegevens van de geselecteerde gebruiker uit de database
    $sql = "SELECT * FROM users_musicMagnetMagazine WHERE userID = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
} else {
    // Haal de gegevens van de ingelogde gebruiker op
    if (isset($_SESSION['email'])) {
        $sql = "SELECT * FROM users_musicMagnetMagazine WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $_SESSION['email']);
    } else {
        $sql = "SELECT * FROM users_musicMagnetMagazine WHERE gebruikersnaam = :gebruikersnaam";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':gebruikersnaam', $_SESSION['gebruikersnaam']);
    }
}

$stmt->execute();
$gebruiker = $stmt->fetch(PDO::FETCH_ASSOC);

// Als de gebruiker niet bestaat, stuur ze dan terug naar de zoekpagina of naar de login-pagina
if (!$gebruiker) {
    header('Location: search.php'); // Of je kunt naar login sturen, afhankelijk van je voorkeur
    exit();
}

// Bepaal of we het profiel van de ingelogde gebruiker of van iemand anders bekijken
$is_own_profile = false;

if (isset($_SESSION['email']) && $gebruiker['email'] === $_SESSION['email']) {
    $is_own_profile = true;
} elseif (isset($_SESSION['gebruikersnaam']) && $gebruiker['gebruikersnaam'] === $_SESSION['gebruikersnaam']) {
    $is_own_profile = true;
}

// Laad de profielview
include('views/profile_view.php');
