<?php
// Start de sessie
session_start();

// Verwijder alle sessiegegevens
session_unset();

// Vernietig de sessie
session_destroy();

// Redirect de gebruiker naar de loginpagina (of een andere pagina)
header('Location: login.php');
exit();
