<?php 
namespace Controllers;

use MVC\Router;

class PaginasControllers{
    public static function index (Router $router){
        $log = is_Auth();
        if(!$log){
            header("Location: /login");
        }
        $router->render("web/index",[
            "titulo" => 'Inicio de Pagina - Analisis de datos',
            "titulo2" => "\"Modelo de BI para la analítica de notificación de casos de dengue en el sistema de vigilancia a la salud pública del Perú\""
        ]);
    }
    
    public static function error (Router $router){
        $log = is_Auth();
        if(!$log){
            header("Location: /user/login");
        }
        $router->render("web/error",[
            "titulo" => "404"
        ]);
    }

    public static function dashboard1(Router $router){
        $log = is_Auth();
        if(!$log){
            header("Location: /login");
        }
        $router->render("dashboards/db1",[
            "titulo" => "Dasboards N°1",
            "title" => "Casos por año"
        ]);
    }
    public static function dashboard2(Router $router){
        $log = is_Auth();
        if(!$log){
            header("Location: /login");
        }
        $router->render("dashboards/db2",[
            "titulo" => "Dasboards N°2",
            "title" => "Casos por sexo"
        ]);
    }
    public static function dashboard3(Router $router){
        $log = is_Auth();
        if(!$log){
            header("Location: /login");
        }
        $router->render("dashboards/db3",[
            "titulo" => "Dasboards N°3",
            "title" => "Casos por departamento"
        ]);
    }
    public static function dashboard4(Router $router){
        $log = is_Auth();
        if(!$log){
            header("Location: /login");
        }
        $router->render("dashboards/db4",[
            "titulo" => "Dasboards N°4",
            "title" => "Casos por provincia"
        ]);
    }
    public static function dashboard5(Router $router){
        $log = is_Auth();
        if(!$log){
            header("Location: /login");
        }
        $router->render("dashboards/db5",[
            "titulo" => "Dasboards N°5",
            "title" => "Casos por distrito"
        ]);
    }
    public static function dashboard6(Router $router){
        $log = is_Auth();
        if(!$log){
            header("Location: /login");
        }
        $router->render("dashboards/db6",[
            "titulo" => "Dasboards N°6",
            "title" => "Casos por grupos etarios"
        ]);
    }
    
    public static function dashboard7(Router $router){
        $log = is_Auth();
        if(!$log){
            header("Location: /login");
        }
        $router->render("dashboards/db7",[
            "titulo" => "Dasboards N°7",
            "title" => "Casos por grupos etarios"
        ]);
    }
}
?>