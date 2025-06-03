<?php

$sql = "SELECT 
club_id,
club_name
FROM clubs
ORDER BY club_id ASC";

$stmt = $db->prepare($sql);
$stmt->execute();
$clubs = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT 
event_type_id,
event_type_name
FROM event_types
ORDER BY event_type_id ASC";

$stmt = $db->prepare($sql);
$stmt->execute();
$eventTypes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT 
team_id,
team_name
FROM teams
ORDER BY team_name ASC";

$stmt = $db->prepare($sql);
$stmt->execute();
$teams = $stmt->fetchAll(PDO::FETCH_ASSOC);