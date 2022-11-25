<?php
require_once('../entidades/rol_usuario.php');
require_once("../datos/dt_rol_usuario.php");

class rolUsuarioController{
    private $dt_usuario;

    public function __construct(){
        $this->dt_usuario = new DT_tbl_usuario();
    }
    public static function asignarUsuarioRol(){
        try 
        {
           
            $id_usuario = $_REQUEST['id_usuario'];
            $id_rol = $_REQUEST['id_rol'];
           
            print($id_usuario);
            print($id_rol);
            
            $ru = new rol_usuario();
            $dtru = new dt_rol_usuario();

            $ru->setTblUsuarioIdUsuario($id_usuario);
            $ru->setTblRolIdRol($id_rol);
           
            

            //$this->usuario->guardarUsuario($tu);
            $dtru->asignarRolUsuario($ru);
            
            
            //header("Location: agregar_rol_usuario.php");
            
        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
        
    }

   public static function editarUsuario()
   {
    try 
    {
        $id = $_REQUEST['id_usuario'];
        $nombre = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellido'];
        $email = $_REQUEST['email'];
        $usuario = $_REQUEST['usuario'];
        $pwd = $_REQUEST['pwd'];
        
        $tu = new tbl_usuario();
        $dtu = new dt_tbl_usuario();

        $tu->setIdUsuario($id);
        $tu->setNombres($nombre);
        $tu->setApellidos($apellidos);
        $tu->setEmail($email);
        $tu->setUsuario($usuario);
        $tu->setPwd($pwd);

        $dtu->editarUsuario($tu);

        header("Location: agregar_usuario.php");
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