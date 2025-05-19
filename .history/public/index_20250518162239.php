<?php

// Définition de la “table de routage”
$routes = [
      'accueil' => __DIR__ . '/../template/public/accueil.html.php',
      'login' => __DIR__ . '/../template/user/login.html.php',
];

// Récupération du paramètre page, valeur par défaut “home” operateur de coalescence des nulls, ça remplace :
// $page = isset($_GET['page']) ? $_GET['page'] : 'home';
$page = $_GET['page'] ?? 'home';


// si la route existe on inclut, sinon 404
if (isset($routes[$page])) {
      require_once __DIR__ . '/../template/partial/_header.html.php';
      require $routes[$page];
      require_once __DIR__ . '/../template/partial/_footer.html.php';
} else {
      include __DIR__ . '/../template/public/404.html.php';
}
