<?php

$sql = "SELECT 
t.team_id,
t.team_name
FROM teams AS t
WHERE t.club_id = 1
ORDER BY t.team_id ASC
";

$stmt = $db->prepare($sql);
$stmt->execute();
$teams = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT
p.player_id,
CONCAT(p.player_first_name, ' ', p.player_last_name) AS player_names,
p.player_biography,
p.player_rank,
tp.player_id,
tp.team_id
FROM players AS p 
JOIN teams_players AS tp
ON p.player_id = tp.player_id
ORDER BY tp.team_id";

$stmt = $db->prepare($sql);
$stmt->execute();
$players = $stmt->fetchAll(PDO::FETCH_ASSOC);
$recordset = [];
foreach ($teams as $team) {
    // Ajoute la clé 'players' vide pour y mettre les joueurs
    $team['players'] = [];
    // Stocke l'équipe dans $teamsById, en utilisant son ID comme clé (ça remplace l'index qui va naturelement de 0 par team_id dans mon tableau)
    $recordset[$team["team_id"]] = $team;
}
foreach ($players as $player) {
    // Récupère l’ID de l’équipe à laquelle appartient ce joueur
    $tid = $player["team_id"];
    // Vérifie que cette équipe existe bien dans $recordset
    if (isset($recordset[$tid])) {
        // Ajoute ce joueur à la fin du tableau 'players' de l’équipe
        $recordset[$tid]['players'][] = [
            'player_id' => $player['player_id'],
            'player_names' => $player['player_names'],
            'player_biography' => $player['player_biography'],
            'player_rank' => $player['player_rank'],
        ];
    }
}

// foreach ($teams as &$team) {
//     $team['players'] = [];
//     foreach ($players as $player) {
//         if ($player['team_id'] === $team['team_id']) {
//             $team['players'][] = $player;
//         }
//     }
// }




