<?php
$sql = "SELECT 
e.event_id, 
e.event_date, 
e.event_type_id, 
et.event_type_name,
c.club_name,
c.club_address,
  (
    SELECT GROUP_CONCAT(t.team_name SEPARATOR ', ')
    FROM inscrire AS i
    JOIN teams AS t 
    ON t.team_id = i.team_id
    WHERE i.event_id = e.event_id
  ) AS team_names
FROM events AS e 
JOIN event_types AS et 
ON e.event_type_id = et.event_type_id 
JOIN clubs AS c
ON e.club_id = c.club_id
WHERE DATE(event_date) >= CURRENT_DATE
ORDER BY event_date ASC";

$stmt = $db->prepare($sql);
$stmt->execute();
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
