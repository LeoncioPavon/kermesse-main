<?php
require_once('../entidades/tbl_parroquia.php');
require_once("../datos/dt_tbl_parroquia.php");

class parroquiaController{
    private $dt_parroquia;

    public function __construct(){
        $this->dt_parroquia = new dt_tbl_parroquia();
    }
    public static function guardarParroquia(){
        try 
        {
           
            $nombre = $_REQUEST['nombre'];
            $direccion = $_REQUEST['direccion'];
            $telefono = $_REQUEST['telefono'];
            $parroco = $_REQUEST['parroco'];
            $logo = $_REQUEST['file'];
            $sitio_web = $_REQUEST['sitio_web'];
         
            $tu = new tbl_parroquia();
            $dtu = new dt_tbl_parroquia();

            $tu->setNombre($nombre);
            $tu->setDireccion($direccion);
            $tu->setTelefono($telefono);
            $tu->setParroco($parroco);
            $tu->setLogo($logo);
            $tu->setSitioWeb($sitio_web);

            $dtu->guardarParroquia($tu);
            
            
            header("Location: agregar_parroquia.php");
            
        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
        
    }


    public function editarUsuario()
    {
        try 
        {
            $idParroquia = $_REQUEST['idParroquia'];
            $nombre = $_REQUEST['nombre'];
            $direccion = $_REQUEST['direccion'];
            $telefono = $_REQUEST['telefono'];
            $parroco = $_REQUEST['parroco'];
            $logo = $_REQUEST['file'];
            $sitio_web = $_REQUEST['sitio_web'];
                        
            $tu = new tbl_parroquia();
            $dtu = new dt_tbl_parroquia();

            $tu->setIdParroquia($idParroquia);
            $tu->setNombre($nombre);
            $tu->setDireccion($direccion);
            $tu->setTelefono($telefono);
            $tu->setParroco($parroco);
            $tu->setLogo($logo);
            $tu->setSitioWeb($sitio_web);
            
            $dtu->editarParroquia($tu);
            
            
            header("Location: parroquia.php");
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
    public static function eliminarParroquia()
    {
     try 
     {
         $id = $_REQUEST['idParroquia'];
         
         $dtu = new dt_tbl_parroquia();
 
         $dtu->editarParroquia($id);
 
         header("Location: parroquia.php");
     } 
     catch (Exception $e) 
     {
         die($e->getMessage());
     }
    } 
}