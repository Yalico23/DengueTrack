<?php 
namespace Controllers;

use Clases\Email;
use Model\Usuarios;
use MVC\Router;

class AuthControllers{

    public static function login (Router $router){
        $titulo = 'Log-in DengueTrack | Analisis de OpenDatas y WebScraping';
        $alertas = [];
        $usuario = new Usuarios();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuarios($_POST);
            $alertas = $usuario->validarLogin();
            if (empty($alertas)) {
                $auth = Usuarios::where('Email', $usuario->Email);
                if (!$auth || $auth->Confirmado === '0') {
                    Usuarios::setAlerta('error', 'Usuarios no encontrado o no confirmado');
                }else{
                    //verificar Password
                    if (password_verify($usuario->Password, $auth->Password)) {
                        //Iniciar Sesion
                        session_start();
                        $_SESSION['Id'] = $auth->Id;
                        $_SESSION['Nombre'] = $auth->Nombre;
                        $_SESSION['Apellido'] = $auth->Apellido;
                        $_SESSION['Email'] = $auth->Email;
                        $_SESSION['Login'] = true;
                        $_SESSION['Admin'] = $auth->Admin ?? null;
                        //Redirrecionar
                        if ($auth->Admin) {
                            header("Location: /admin/dashboard");
                        }else{
                            header("Location: /");
                        }
                    }else{
                        Usuarios::setAlerta('error', 'Contraseña incorrecta');
                    }
                }
            }
        }
        $alertas = Usuarios::getAlertas();
        $router->render("auth/login", [
            "titulo" =>$titulo,
            "alertas" =>$alertas,
            "usuario"=>$usuario
        ]);
    }
    
    public static function crear (Router $router){
        $alertas = [];
        $usuario = new Usuarios();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuarios($_POST);
            $alertas = $usuario->validar();
            if(empty($alertas)){
                //echo "Pasaste la validacion";
                $resultado = $usuario->existeUsuario(); 
                //devuelve el numero de alertas
                if ($resultado->num_rows) {
                    $alertas = Usuarios::getAlertas(); 
                    //obtnego las alertas que estan en memoria despues de la validacion
                } else {
                    //Hashear el password
                    $usuario->hashearPassword(); //60 caracteres
                    //Generar token unico
                    $usuario->crearToken(); //13 caracteres
                    //Enviar Email
                    $email  = new Email($usuario->Email, $usuario->Nombre, $usuario->Token);
                    $email->EnviarConfirmacion();

                    //Crear usuario
                    $resultado = $usuario->guardar();
                    if ($resultado) {
                        header('Location: /user/mensaje');
                    }
                }
            }

        }
        $router->render("auth/crear",[
            "titulo" => "Crear Cuenta",
            "alertas" => $alertas,
            "usuario" => $usuario
        ]);
    }

    public static function mensaje(Router $router){
        $router->render("auth/mensaje",[
            "titulo" => "Mensaje"
        ]);
    }
    public static function logout(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION = [];
            header("Location: /");
        }
    }
    public static function confirmar(Router $router){
        $token = s($_GET['token']);
        $alertas = [];

        if(!$token) header("Location: /");

        //Encontrar usuario
        $usuario = Usuarios::where('Token', $token);
        if (empty($usuario)) {
            Usuarios::setAlerta('error', 'Token no valido');
        }else{
            $usuario->confirmarUsuario();
            $usuario->guardar();
            Usuarios::setAlerta('exito', 'Cuenta comprobada Correctamente');
        }
        $alertas = Usuarios::getAlertas();
        
        $router->render("auth/confirmar",[
            "titulo" => "Confirma tu cuenta en DevWebCamp",
            "alertas" => $alertas
        ]);
    }
    public static function olvide(Router $router){
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuarios($_POST);
            $alertas = $auth->validarEmail();
            if (empty($alertas)) {
                $usuario = Usuarios::where('Email', $auth->Email);
                if ($usuario && $usuario->Confirmado === '1') {
                    //Generar Token
                    $usuario->crearToken();
                    $usuario->guardar();//usamos el update
                    // Enviar Email
                    $email = new Email($usuario->Email,$usuario->Nombre,$usuario->Token);
                    $email->enviarInstrucciones();
                    //Alerta de Exito
                    Usuarios::setAlerta('exito','Revisar Email');
                }else{
                    Usuarios::setAlerta('error','Usuario no encontrado o no confirmado');
                }
            }
        }
        $alertas = Usuarios::getAlertas();
        $router->render("auth/olvide",[
            "titulo" => "Olvide Cuenta",
            "alertas" => $alertas
        ]);
    }

    public static function recuperar (Router $router){
        
        $alertas = [];
        $error = false;
        $token = s($_GET['token']);
        $usuario = Usuarios::where('Token', $token);
        if (empty($usuario) || $usuario->Token === '') {
            Usuarios::setAlerta('error', 'Token no valido');
            $error = true;
        } 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = new Usuarios($_POST);
            $alertas=$password->validarPassword();
            if (empty($alertas)) {
                $usuario->Token = null;
                $usuario->Password=null;
                $usuario->Password=$password->Password;
                $usuario->hashearPassword();
                $resultado=$usuario->guardar();//update
                if ($resultado) {
                    header("Location: /user/login");
                }
            }
        }

        $alertas = Usuarios::getAlertas();
        $router->render("auth/recuperar", [
            "alertas"=>$alertas,
            "error"=>$error,
            "titulo"=>"Restablecer Contraseña"
        ]);
    }
}
?>