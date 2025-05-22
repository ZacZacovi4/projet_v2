<?php
function redirect($path)
{
    header("Location:" . $path);
    exit();
}

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