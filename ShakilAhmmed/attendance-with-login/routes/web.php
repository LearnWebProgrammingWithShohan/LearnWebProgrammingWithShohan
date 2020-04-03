<?php


$router->filter('auth' , function () {
	 if (!isset($_SESSION['user'])) {
		  header('Location: /');

		  return false;
	 }
});
$router->controller('/' , \App\Controllers\LoginController::class);

$router->group(['before' => 'auth'] , function ($router) {
	 $router->controller('/dashboard' , \App\Controllers\DashboardController::class);
});



