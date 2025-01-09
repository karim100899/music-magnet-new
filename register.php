<?php
session_start();
include('config.php'); // Inclusief de databaseconfiguratie

// Fouten kunnen later worden weergegeven
$error = '';

// Controleer of het formulier is ingediend
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verkrijg de gebruikersgegevens
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];
    $wachtwoord_herhaal = $_POST['wachtwoord_herhaal'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $profielfoto = null; // Standaard geen profielfoto

    // Check of de wachtwoorden overeenkomen
    if ($wachtwoord != $wachtwoord_herhaal) {
        $error = "De wachtwoorden komen niet overeen!";
    } else {
        // Wachtwoord hashen
        $gehasht_wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);

        // Als er een profielfoto is geüpload, verwerk die
        if ($_FILES['profielfoto']['error'] == 0) {
            // Controleer de bestandsextensie van de foto
            $allowed_extensions = ['jpg', 'jpeg', 'png'];
            $file_extension = strtolower(pathinfo($_FILES['profielfoto']['name'], PATHINFO_EXTENSION));

            if (in_array($file_extension, $allowed_extensions)) {
                $upload_dir = 'uploads/profielfoto/';
                $profielfoto_naam = uniqid() . '.' . $file_extension;
                $profielfoto_pad = $upload_dir . $profielfoto_naam;

                // Probeer het bestand te verplaatsen naar de uploadmap
                if (move_uploaded_file($_FILES['profielfoto']['tmp_name'], $profielfoto_pad)) {
                    $profielfoto = $profielfoto_pad; // Gebruik het pad van de geüploade foto
                } else {
                    $error = "Er is een fout opgetreden bij het uploaden van de profielfoto.";
                }
            } else {
                $error = "Alleen .jpg, .jpeg of .png bestanden zijn toegestaan!";
            }
        }

        // Voeg de gebruiker toe aan de database als er geen fout is
        if (!$error) {
            $sql = "INSERT INTO users_musicMagnetMagazine (gebruikersnaam, email, wachtwoord, telefoonnummer, profielfoto) 
                    VALUES (:gebruikersnaam, :email, :wachtwoord, :telefoonnummer, :profielfoto)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':gebruikersnaam', $gebruikersnaam);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':wachtwoord', $gehasht_wachtwoord);
            $stmt->bindParam(':telefoonnummer', $telefoonnummer);
            $stmt->bindParam(':profielfoto', $profielfoto);

            if ($stmt->execute()) {
                // Sla de gebruiker in de sessie op en redirect naar het profiel
                $_SESSION['email'] = $email;
                header('Location: profile.php');
                exit();
            } else {
                $error = "Er is een fout opgetreden bij het aanmaken van het account!";
            }
        }
    }
}

// Laad de HTML pagina in de onderstaande include.
include('views/register_view.php');
