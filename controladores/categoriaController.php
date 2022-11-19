<?php
require_once('../entidades/tbl_categoria_producto.php');
require_once("../datos/dt_tbl_categoria.php");

class categoriaController
{
    private $dt_categoria;

    public function __construct()
    {
        $this->dt_categoria = new DT_tbl_categoria();
    }
    public static function guardarCategoria()
    {
        try {
            $nombre = $_REQUEST['nombre'];
            $descripcion = $_REQUEST['descripcion'];

            $tu = new tbl_categoria_producto();
            $dtu = new dt_tbl_categoria();

            $tu->setNombre($nombre);
            $tu->setDescripcion($descripcion);

           
            $dtu->guardarCategoria($tu);


            header("Location: agregar_categoriaProd.php");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function editarCategoria()
    {
        try 
        {
            
            $id_categoria_producto = $_REQUEST['id_categoria_producto'];
            $nombre = $_REQUEST['nombre'];
            $descripcion = $_REQUEST['descripcion'];
        
            $tu = new tbl_categoria_producto();
            $dtu = new dt_tbl_categoria();

            $tu->setIdCategoriaProducto($id_categoria_producto);
            $tu->setNombre($nombre);
            $tu->setDescripcion($descripcion);

            $dtu->editarCategoria($tu);
            
            header("Location: categoria.php");
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}