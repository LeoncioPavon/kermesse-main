<?php
require_once('../entidades/tbl_usuario.php');
require_once("../datos/dt_tbl_usuario.php");

class usuarioController{
    private $dt_usuario;

    public function __construct(){
        $this->dt_usuario = new DT_tbl_usuario();
    }
    public static function guardarUsuario(){
        try 
        {
           
            $nombre = $_REQUEST['nombre'];
            $apellidos = $_REQUEST['apellido'];
            $email = $_REQUEST['email'];
            $usuario = $_REQUEST['usuario'];
            $pwd = $_REQUEST['pwd'];
            $data = "'".$nombre."'".$apellidos."'".$email."'".$usuario."'".$pwd;
            
            $tu = new tbl_usuario();
            $dtu = new dt_tbl_usuario();

            $tu->setNombres($nombre);
            $tu->setApellidos($apellidos);
            $tu->setEmail($email);
            $tu->setUsuario($usuario);
            $tu->setPwd($pwd);
            

            //$this->usuario->guardarUsuario($tu);
            $dtu->guardarUsuario($tu);
            
            
            header("Location: agregar_usuario.php");
            
        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
        
    }


    public function editarUsuario()
    {
        try 
        {
            $id = $_REQUEST['id_usuario'];
            $nombre = $_REQUEST['nombre'];
            $apellidos = $_REQUEST['apellido'];
            $email = $_REQUEST['email'];
            $usuario = $_REQUEST['usuario'];
            $pwd = $_REQUEST['pwd'];
            $data = "'".$nombre."'".$apellidos."'".$email."'".$usuario."'".$pwd;
            
            $tu = new tbl_usuario();
            $dtu = new dt_tbl_usuario();

            $tu->setIdUsuario($id);
            $tu->setNombres($nombre);
            $tu->setApellidos($apellidos);
            $tu->setEmail($email);
            $tu->setUsuario($usuario);
            $tu->setPwd($pwd);
            

            //$this->usuario->guardarUsuario($tu);
            $dtu->editarUsuario($tu);
            
            
            header("Location: usuario.php");
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
    public static function eliminarUsuario()
    {
     try 
     {
         $id = $_REQUEST['id_usuario'];
         
         $dtu = new dt_tbl_usuario();
 
         $dtu->editarUsuario($id);
 
         header("Location: usuario.php");
     } 
     catch (Exception $e) 
     {
         die($e->getMessage());
     }
    } 
}