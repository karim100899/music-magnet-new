<?php
session_start();
include('config.php'); // Databaseverbinding

// Als het formulier is ingediend
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $invoer = $_POST['invoer']; // Dit kan een gebruikersnaam of e-mail zijn
    $wachtwoord = $_POST['wachtwoord'];

    // Controleer of de invoer een geldig e-mailadres is
    if (filter_var($invoer, FILTER_VALIDATE_EMAIL)) {
        // Het is een e-mailadres
        $query = "SELECT * FROM users_musicMagnetMagazine WHERE email = :invoer LIMIT 1";
    } else {
        // Het is een gebruikersnaam
        $query = "SELECT * FROM users_musicMagnetMagazine WHERE gebruikersnaam = :invoer LIMIT 1";
    }

    // Bereid en voer de query uit
    $stmt = $pdo->prepare($query);
    $stmt->execute([':invoer' => $invoer]);
    $gebruiker = $stmt->fetch();

    // Als de gebruiker bestaat en het wachtwoord correct is
    if ($gebruiker && password_verify($wachtwoord, $gebruiker['wachtwoord'])) {
        // Zet de gebruikersinformatie in de sessie
        $_SESSION['gebruiker_id'] = $gebruiker['userID'];
        $_SESSION['gebruikersnaam'] = $gebruiker['gebruikersnaam'];
        $_SESSION['email'] = $gebruiker['email'];

        // Redirect naar de profielpagina
        header("Location: profile.php");
        exit;
    } else {
        // Foutmelding als de inloggegevens niet kloppen
        $foutmelding = "Onjuiste gebruikersnaam, e-mailadres of wachtwoord.";
    }
}

// Laad de view voor de loginpagina
include('views/login_view.php');