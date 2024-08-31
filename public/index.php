<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AuthControllers;
use Controllers\PaginasControllers;
use MVC\Router;

$router = new Router();

//Paginas
$router->get("/",[PaginasControllers::class,"index"]);
$router->get("/404",[PaginasControllers::class,"error"]);

//Login
$router->get("/user/login",[AuthControllers::class,"login"]);
$router->post("/user/login",[AuthControllers::class,"login"]);
$router->post("/user/logout",[AuthControllers::class,"logout"]);
$router->get("/user/crear-cuenta",[AuthControllers::class,"crear"]);
$router->post("/user/crear-cuenta",[AuthControllers::class,"crear"]);
$router->get("/user/olvide-cuenta",[AuthControllers::class,"olvide"]);
$router->post("/user/olvide-cuenta",[AuthControllers::class,"olvide"]);
$router->get("/user/mensaje",[AuthControllers::class,"mensaje"]);
$router->get("/user/confirmar",[AuthControllers::class,"confirmar"]);
$router->get("/user/olvide-cuenta",[AuthControllers::class,"olvide"]);
$router->post("/user/olvide-cuenta",[AuthControllers::class,"olvide"]);
$router->get("/user/recuperar",[AuthControllers::class,"recuperar"]);
$router->post("/user/recuperar",[AuthControllers::class,"recuperar"]);
//Dashboards
$router->get("/dashboard1",[PaginasControllers::class,"dashboard1"]);
$router->get("/dashboard2",[PaginasControllers::class,"dashboard2"]);
$router->get("/dashboard3",[PaginasControllers::class,"dashboard3"]);
$router->get("/dashboard4",[PaginasControllers::class,"dashboard4"]);
$router->get("/dashboard5",[PaginasControllers::class,"dashboard5"]);
$router->get("/dashboard6",[PaginasControllers::class,"dashboard6"]);
$router->get("/dashboard7",[PaginasControllers::class,"dashboard7"]);

//APis

$router->comprobarRutas();