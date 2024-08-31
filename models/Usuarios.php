<?php 
namespace Model;

class Usuarios extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['Id', 'Nombre', 'Apellido', 'Email', 'Password', 'Token', 'Confirmado'];

    public $Id;
    public $Nombre;
    public $Apellido;
    public $Email;
    public $Password;
    public $Token;
    public $Confirmado;

    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? null;
        $this->Nombre = $args['Nombre'] ?? '';
        $this->Apellido = $args['Apellido'] ?? '';
        $this->Email = $args['Email'] ?? '';
        $this->Password = $args['Password'] ?? '';
        $this->Token = $args['Token'] ?? '';
        $this->Confirmado = $args['Confirmado'] ?? '0';
    }

    public function validar(){
        $this->Nombre = trim($this->Nombre);
        $this->Apellido = trim($this->Apellido);
        $this->Email = trim($this->Email);
        $this->Password = trim($this->Password);
    
        // Validación de campos
        if(empty($this->Nombre)) {
            self::$alertas['error'][] = 'Nombre es requerido';
        }
        if(empty($this->Apellido)) {
            self::$alertas['error'][] = 'Apellido es requerido';
        }
        if(empty($this->Email) || !filter_var($this->Email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Email es requerido y debe ser valido';
        }
        if(empty($this->Password)) {
            self::$alertas['error'][] = 'Password es requerido';
        } elseif(strlen($this->Password) < 6) {
            self::$alertas['error'][] = 'Password debe contener al menos 6 caracteres';
        } elseif(preg_match('/[\'"\/\\\<\>\%\;\(\)]/', $this->Password)) {
            self::$alertas['error'][] = 'Password contiene caracteres invalidos';
        }
    
        return self::$alertas;
    }

    public function validarEmail(){
        !$this->Email ? self::$alertas['error'][] = 'Email es requerido' : '';
                
        return self::$alertas;
    }
    public function validarPassword(){
        if (!$this->Password) {
            self::$alertas['error'][] = "Password es requerido";
        } else {
            if (strlen($this->Password) < 6) {
                self::$alertas['error'][] = "Password es demasiado corto";
            }
        }        
        return self::$alertas;
    }

    public function validarLogin(){
        $this->Email = trim($this->Email);
        $this->Password = trim($this->Password);

        if(empty($this->Email) || !filter_var($this->Email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Email es requerido y debe ser valido';
        }
        if(empty($this->Password)) {
            self::$alertas['error'][] = 'Password es requerido';
        } elseif(strlen($this->Password) < 6) {
            self::$alertas['error'][] = 'Password debe tener al menos 6 caracteres';
        } elseif(preg_match('/[\'"\/\\\<\>\%\;\(\)]/', $this->Password)) {
            self::$alertas['error'][] = 'Password contiene caracteres invalidos';
        }
    
        return self::$alertas;
    }
    //Revisa si el user existe
    public function existeUsuario(){
        $query = "SELECT * FROM " . self::$tabla . " WHERE Email = '". $this->Email ."' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][]='El usuario ya esta registrado';
        }
        return $resultado;
    }
    public function checkPassword($Password){
        $resultado = password_verify($Password,$this->Password);
        if (!$resultado || !$this->Confirmado) {
            self::$alertas['error'][]="Contraseña incorrecta";
        }else{
            return true;
        }
    }

    public function hashearPassword() : void{
        $this->Password = password_hash($this->Password, PASSWORD_BCRYPT);
    }
    public function crearToken() : void{
        $this->Token = uniqid();
    }
    public function confirmarUsuario() : void{
        $this->Confirmado = 1;
        $this->Token = '';
    }
}
?>