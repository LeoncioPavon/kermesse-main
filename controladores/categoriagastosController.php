

<?php
require_once('../entidades/tbl_categoria_gastos.php');
require_once("../datos/dt_tbl_categoria_gastos.php");

class categoriagastosController
{
    private $dt_categoria_gastos;

    public function __construct()
    {
        $this->dt_categoria_gastos = new dt_tbl_categoria_gastos();
    }
    public static function guardarCategoriaGastos()
    {
        try {
            $nombre_categoria = $_REQUEST['nombre_categoria'];
            $descripcion = $_REQUEST['descripcion'];

            $tu = new tbl_categoria_gastos();
            $dtu = new dt_tbl_categoria_gastos();

            $tu->setNombreCategoria($nombre_categoria);
            $tu->setDescripcion($descripcion);

           
            $dtu->guardarCategoriaGastos($tu);


            header("Location: agregar_gastos.php");

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function editarCategoriaGastos()
    {
        try 
        {
            
            $id_categoria_gastos = $_REQUEST['id_categoria_gastos'];
            $nombre_categoria = $_REQUEST['nombre_categoria'];
            $descripcion = $_REQUEST['descripcion'];
        
            $tu = new tbl_categoria_gastos();
            $dtu = new dt_tbl_categoria_gastos();

            $tu->setIdCategoriaGastos($id_categoria_gastos);
            $tu->setNombreCategoria($nombre_categoria);
            $tu->setDescripcion($descripcion);

            $dtu->editarCategoriaGastos($tu);
            
            header("Location: gastos.php");
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}