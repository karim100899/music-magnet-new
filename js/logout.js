// Functie om de uitlog-bevestiging te tonen
function bevestigUitloggen() {
    // Toon de bevestigingspop-up
    let bevestiging = confirm("Weet je zeker dat je wilt uitloggen?");
    if (bevestiging) {
        // Als de gebruiker bevestigt, voer uitloggen uit zonder pagina opnieuw te laden
        window.location.href = 'logout.php'; // Verzend de gebruiker naar logout.php
    }
}