<?php

// Définition de la “table de routage”
$routes = [
      'accueil' => __DIR__ . '/../template/accueil.html.php',
];

// Récupération du paramètre page, valeur par défaut “home” operateur de coalescence des nulls, ça remplace :
// $page = isset($_GET['page']) ? $_GET['page'] : 'home';
$page = $_GET['page'] ?? 'home';


// si la route existe on inclut, sinon 404
if (isset($routes[$page])) {
      require $routes[$page];
} else {
      http_response_code(404);
      die('Page non trouvée');
}