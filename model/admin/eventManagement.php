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

// gestion d'affichage et de modification des evenements

$sql = "SELECT 
e.event_id, 
e.event_date, 
e.event_type_id, 
e.event_capacity,
et.event_type_name,
c.club_id,
c.club_name,
u.user_first_name,
  (
    SELECT GROUP_CONCAT(t.team_id SEPARATOR ', ')
    FROM inscrire AS i
    JOIN teams AS t 
    ON t.team_id = i.team_id
    WHERE i.event_id = e.event_id
  ) AS team_ids,
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
JOIN users AS u
ON e.user_id = u.user_id
ORDER BY event_date ASC
";

$stmt = $db->prepare($sql);
$stmt->execute();
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

// traitement du formulaire et l'insertion de l'evenement cré dans la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // reçoit json de front avec les champs de formulaire et le decode
    $data = json_decode(file_get_contents('php://input'), true);
    // Recuperation et nettoyage de données envoyé
    $action = $data['action'];

    switch ($action) {
        case "creation":

            $clubID = $data['club_id'];
            $eventTypeID = $data['event_type_id'];
            $eventDate = $data['event_date'];
            $eventCapacity = $data['event_capacity'];
            // on peut utiliser array_filter par sans des paramétres suplementaires, car par defalut elle va filtrer 0, false, null, "" etc.
            if (!is_array($data['teams_id[]'])) {
                $data['teams_id[]'] = [$data['teams_id[]']];
            }
            $teams_id = array_filter($data['teams_id[]'], fn($v) => $v !== '');


            // Verification si on a bien reçu des données de nos champs
            if (
                empty($clubID) ||
                empty($eventTypeID) ||
                empty($eventDate) ||
                empty($eventCapacity) ||
                empty($teams_id)
            ) {
                http_response_code(400);
            } else {

                $sql = 'INSERT INTO events (user_id, club_id, event_type_id, event_date, event_capacity) VALUES (:user_id, :club_id, :event_type_id, :event_date, :event_capacity)';

                $stmt = $db->prepare($sql);
                $params = [
                    ':user_id' => $_SESSION['user_id'],
                    ':club_id' => $clubID,
                    ':event_type_id' => $eventTypeID,
                    ':event_date' => $eventDate,
                    ':event_capacity' => $eventCapacity,
                ];

                // verification si la requette est executé et les données sont bien inserés dans la base de données
                // on utilise le block try catch parce que dans mon PDO est allumé le mode de gestion d'exceptions
                try {
                    if ($stmt->execute($params)) {
                        // recperation de dernier id inserer dans notre base de données, vu qu'on créer un événement juste avant on aura son id avec la méthode lastInsertId.
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
                        http_response_code(200);
                    }
                } catch (PDOException $e) {
                    http_response_code(500);
                }
            }
            break;
        case "modification":

            $eventID = $data['event_id'];
            $clubID = $data['club_id'];
            $eventTypeID = $data['event_type_id'];
            $eventDate = $data['event_date'];
            $eventCapacity = $data['event_capacity'];
            // on peut utiliser array_filter par sans des paramétres suplementaires, car par defalut elle va filtrer 0, false, null, "" etc.
            if (!is_array($data['teams_id[]'])) {
                $data['teams_id[]'] = [$data['teams_id[]']];
            }
            $teams_id = array_filter($data['teams_id[]'], fn($v) => $v !== '');

            // Verification si on a bien reçu des données de nos champs
            if (
                empty($eventID) ||
                empty($clubID) ||
                empty($eventTypeID) ||
                empty($eventDate) ||
                empty($eventCapacity) ||
                empty($teams_id)
            ) {
                http_response_code(400);
            } else {

                $sql = 'UPDATE events SET club_id = :club_id, event_type_id = :event_type_id, event_date = :event_date, event_capacity = :event_capacity WHERE event_id = :event_id';

                $stmt = $db->prepare($sql);
                $params = [
                    ':club_id' => $clubID,
                    ':event_type_id' => $eventTypeID,
                    ':event_date' => $eventDate,
                    ':event_capacity' => $eventCapacity,
                    ':event_id' => $eventID,
                ];

                // verification si la requette est executé et les données sont bien effacés puis inserés dans la base de données
                // on utilise le block try catch parce que dans mon PDO est allumé le mode de gestion d'exceptions
                try {
                    if ($stmt->execute($params)) {

                        $sql = 'DELETE FROM inscrire WHERE event_id = :event_id';
                        $stmt = $db->prepare($sql);
                        $params = [
                            ':event_id' => $eventID,
                        ];
                        if ($stmt->execute($params)) {

                            foreach ($teams_id as $team_id):
                                $sql = 'INSERT INTO inscrire (event_id, team_id) VALUES (:event_id, :team_id)';
                                $stmt = $db->prepare($sql);
                                $params = [
                                    ':event_id' => $eventID,
                                    ':team_id' => $team_id,
                                ];
                                $stmt->execute($params);
                            endforeach;
                            http_response_code(200);
                        }
                    }
                } catch (PDOException $e) {
                    http_response_code(500);
                }
            }
            break;
        case "deletion":

            $eventID = $data['event_id'];
            // Verification si on a bien reçu des données de nos champs
            if (empty($eventID)) {
                http_response_code(400);
            } else {

                $sql = 'DELETE FROM inscrire WHERE event_id = :event_id';
                $stmt = $db->prepare($sql);
                $params = [
                    ':event_id' => $eventID,
                ];

                // verification si la requette est executé et les données sont bien effacés puis inserés dans la base de données
                // on utilise le block try catch parce que dans mon PDO est allumé le mode de gestion d'exceptions
                try {
                    if ($stmt->execute($params)) {

                        $sql = 'DELETE FROM events WHERE event_id = :event_id';
                        $stmt = $db->prepare($sql);
                        $params = [
                            ':event_id' => $eventID,
                        ];
                        $stmt->execute($params);
                        http_response_code(200);
                    }
                } catch (PDOException $e) {
                    http_response_code(500);
                }
            }
            break;
    }
}





