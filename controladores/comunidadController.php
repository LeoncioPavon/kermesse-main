<?php
require_once('../entidades/tbl_comunidad.php');
require_once("../datos/dt_tbl_comunidad.php");

class comunidadController
{
    private $dt_comunidada;

    public function __construct()
    {
        $this->dt_comunidad = new DT_tbl_comunidad();
    }
    public static function guardarComunidad()
    {
        try {
            $nombre = $_REQUEST['nombre'];
            $responsable = $_REQUEST['responsable'];
            $desc_contribucion = $_REQUEST['desccontribucion'];
    
            $tu = new tbl_comunidad();
            $dta = new dt_tbl_comunidad();

            $tu->setNombre($nombre);
            $tu->setResponsable($responsable);
            $tu->setDescContribucion($desc_contribucion);


            $dta->guardarComunidad($tu);


            header("Location: agregar_comunidad.php");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editarComunidad()
    {
        try 
        {
            $id_comunidad = $_REQUEST['id_comunidad'];
            $nombre = $_REQUEST['nombre'];
            $responsable = $_REQUEST['responsable'];
            $desc_contribucion = $_REQUEST['desc_contribucion'];
            
            $tu = new tbl_comunidad();
            $dtu = new dt_tbl_comunidad();

            $tu->setIdComunidad($id_comunidad);
            $tu->setNombre($nombre);
            $tu->setResponsable($responsable);
            $tu->setDescContribucion($desc_contribucion);

            //$this->usuario->guardarUsuario($tu);
            $dtu->editarComunidad($tu);
            
            
            header("Location: comunidad.php");
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}