<?php

// recuperation des valeurs pour le formulaire de création d'evenement

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

// traitement du formulaire et l'insertion de l'evenement cré dans la base de données



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (
        empty($_POST['club_id']) ||
        empty($_POST['event_type_id']) ||
        empty($_POST['event_date']) ||
        empty($_POST['event_capacity']) ||
        empty(array_filter($_POST['teams_id']))

    ) {
        die('error');
    }

    $clubID = $_POST['club_id'];
    $eventTypeID = $_POST['event_type_id'];
    $eventDate = $_POST['event_date'];
    $eventCapacity = $_POST['event_capacity'];
    // on peut utiliser array_filter par sans des paramétres suplementaires, car par defalut elle va filtrer 0, false, null, "" etc.
    $teams_id = array_filter($_POST['teams_id'], fn($v) => $v !== '');

    $sql = 'INSERT INTO events (user_id, club_id, event_type_id, event_date, event_capacity) VALUES (:user_id, :club_id, :event_type_id, :event_date, :event_capacity)';

    $stmt = $db->prepare($sql);
    $params = [
        ':user_id' => $_SESSION['user_id'],
        ':club_id' => $clubID,
        ':event_type_id' => $eventTypeID,
        ':event_date' => $eventDate,
        ':event_capacity' => $eventCapacity,
    ];

    if ($stmt->execute($params)) {
        echo "L’événement a été créé avec succès !";
    } else {
        echo "Erreur lors de la création de l’événement.";
    }

    $lastID = $db->lastInsertId();

    foreach ($teams_id as $team_id):
        $sql = 'INSERT INTO inscrire (event_id, team_id) VALUES (:event_id, :team_id)';
        $stmt = $db->prepare($sql);
        $params = [
            ':event_id' => $lastID,
            ':team_id' => $team_id
        ];
        $stmt->execute($params);
    endforeach;
}





// exit();
