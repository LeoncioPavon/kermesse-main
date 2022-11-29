<?php
require_once('../entidades/tbl_rol.php');
require_once("../datos/dt_tbl_rol.php");

class rolController{
    private $dt_rol;

    public function __construct(){
        $this->dt_rol = new DT_tbl_rol();
    }
    public static function guardarRol(){
        try 
        {
           
            $rol_descripcion = $_REQUEST['rol_descripcion'];
            
            $tu = new tbl_rol();
            $dtu = new dt_tbl_rol();

            $tu->setRolDescripcion($rol_descripcion);

            $dtu->guardarRol($tu);
            
            
            header("Location: agregar_rol.php");
            
        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
        
    }


    public function editarRol()
    {
        try 
        {
            $id_rol = $_REQUEST['id_rol'];
            $rol_descripcion = $_REQUEST['rol_descripcion'];
            
            $tu = new tbl_rol();
            $dtu = new dt_tbl_rol();

            $tu->setIdRol($id_rol);
            $tu->setRolDescripcion($rol_descripcion);

            $dtu->editarRol($tu);
            
            
            header("Location: roles.php");
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
    public static function eliminarRol()
    {
     try 
     {
         $id_rol = $_REQUEST['id_rol'];
         
         $dtu = new dt_tbl_rol();
 
         $dtu->editarROl($id_rol);
 
         header("Location: roles.php");
     } 
     catch (Exception $e) 
     {
         die($e->getMessage());
     }
    } 
}