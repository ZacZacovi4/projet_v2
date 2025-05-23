<?php
session_start(); // Toujours en tout début de script
require_once __DIR__ . "/../include/function.php";
require_once __DIR__ . "/../include/connect.php";
require_once __DIR__ . "/../include/auth.php";
// Yannick echo password_hash("111", PASSWORD_DEFAULT);
// Admin echo password_hash("123", PASSWORD_DEFAULT);


// Définition des routes avec un flag 'auth' pour les pages protégées
$routes = [
      'home' => ['model' => 'public/home', 'template' => 'public/home'],
      'about' => ['model' => 'public/about', 'template' => 'public/about'],
      'showroom' => ['model' => 'public/showroom', 'template' => 'public/showroom'],
      'login' => ['model' => 'user/login', 'template' => 'user/login'],
      'register' => ['model' => 'user/register', 'template' => 'user/register'],
      'menu' => ['model' => 'user/menu', 'template' => 'user/menu', 'auth' => true],
      'order' => ['model' => 'user/order', 'template' => 'user/order', 'auth' => true],
      'reservation' => ['model' => 'user/reservation', 'template' => 'user/reservation', 'auth' => true],
      'userProfile' => ['model' => 'user/userProfile', 'template' => 'user/userProfile', 'auth' => true],
      'payementMethod' => ['model' => 'user/payementMethod', 'template' => 'user/payementMethod', 'auth' => true],
      'friend' => ['model' => 'user/friend', 'template' => 'user/friend', 'auth' => true],
      'admin' => ['model' => 'user/admin', 'template' => 'admin/admin', 'auth' => true],
      'logout' => ['model' => 'user/logout'],
];

// Récupération du paramètre page, valeur par défaut “home” operateur de coalescence des nulls, ça remplace :
// $page = isset($_GET['page']) ? $_GET['page'] : 'home';
$page = $_GET['page'] ?? 'home';

// Si la route n’existe pas → 404
if (!isset($routes[$page])) {
      include __DIR__ . '/../template/public/404.html.php';
}

$route = $routes[$page];
// Guard : si la route est protégée et que l’utilisateur n’est pas connecté

if (
      (isset($route['auth']) && $route['auth'] === true)
      && !isLoggedIn()
) {
      redirect("index.php?page=login");
}

// Inclusion du modèle
if (!empty($route['model'])) {
      require_once __DIR__ . "/../model/{$route['model']}.php";
}

// Inclusion de l’en-tête
require_once __DIR__ . '/../template/partial/_header.html.php';

// Inclusion du template 
if (!empty($route["template"])) {
      require_once __DIR__ . "/../template/{$route['template']}.html.php";
}

// Inclusion du pied de page
require_once __DIR__ . '/../template/partial/_footer.html.php';

