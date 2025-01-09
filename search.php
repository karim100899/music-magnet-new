<?php
session_start();
include('config.php'); // Inclusief de databaseconfiguratie

// Zoekfunctionaliteit
$search_query = '';
$resultaten = [];

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search'])) {
    $search_query = $_GET['search'];
    // Database query voor het zoeken naar gebruikers
    $sql = "SELECT * FROM users_musicMagnetMagazine WHERE gebruikersnaam LIKE :zoekterm OR email LIKE :zoekterm";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':zoekterm', '%'.$search_query.'%');
    $stmt->execute();
    $resultaten = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Hier de HTML inclusief de zoekresultaten doorgeven aan de view
include('views/search_view.php');