<?php
function redirect($path)
{
    header("Location:" . $path);
    exit();
}
// Formate une date/heure en français avec le fuseau Europe/Paris.
// Utilise IntlDateFormatter pour produire une représentation textuelle en français, de la forme : « vendredi 22 mai 2025 à 14h30 »
function formatData($data)
{
    $dt = new DateTime($data, new DateTimeZone('Europe/Paris'));

    $formatter = new IntlDateFormatter(
        'fr_FR',
        IntlDateFormatter::NONE,
        IntlDateFormatter::NONE,
        'Europe/Paris',
        IntlDateFormatter::GREGORIAN,
        "EEEE d MMMM yyyy 'à' HH'h'mm"
    );

    return ucfirst($formatter->format($dt));
}