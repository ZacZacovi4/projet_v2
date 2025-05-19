<?php

// Définition de la “table de routage”
$routes = [
      'home' => ['model' => 'public/home', 'template' => 'public/home'],
      'login' => ['model' => 'user/login', 'template' => 'user/login'],
      'register' => ['model' => 'user/register', 'template' => 'user/register'],
];

// Récupération du paramètre page, valeur par défaut “home” operateur de coalescence des nulls, ça remplace :
// $page = isset($_GET['page']) ? $_GET['page'] : 'home';
$page = $_GET['page'] ?? 'home';


// si la route existe on inclut, sinon 404
if (isset($routes[$page])) {
      $route = $routes[$page];
      require_once __DIR__ . '/../template/partial/_header.html.php';
      if (!empty($route['model'])) {
            require_once __DIR__ . "/../model/{$route['model']}.php";
      }
      if (!empty($route["template"])) {
            require_once __DIR__ . "/../template/{$route['template']}.html.php";
      }
      require_once __DIR__ . '/../template/partial/_footer.html.php';
} else {
      include __DIR__ . '/../template/public/404.html.php';
}
