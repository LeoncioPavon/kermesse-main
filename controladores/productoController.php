<?php
require_once('../entidades/tbl_productos.php');
require_once("../datos/dt_tbl_productos.php");

class productoController{
    private $dt_producto;

    public function __construct(){
        $this->dt_producto = new dt_tbl_productos();
    }
    public static function guardarProductos(){
        try 
        {
            $id_comunidad = $_REQUEST['id_comunidad'];
            $id_cat_producto = $_REQUEST['id_categoria'];
            $nombre = $_REQUEST['nombre'];
            $descripcion = $_REQUEST['descripcion'];
            $cantidad = $_REQUEST['cantidad'];
            $preciov_sugerido = $_REQUEST['preciov_sugerido'];
            
            $tu = new tbl_producto();
            $dtu = new dt_tbl_productos();
            
            $tu->setIdComunidad($id_comunidad);
            $tu->setIdCatProducto($id_cat_producto);
            $tu->setNombres($nombre);
            $tu->setDescripcion($descripcion);
            $tu->setCantidad($cantidad);
            $tu->setPreciovSugerido($preciov_sugerido);

            $dtu->guardarProducto($tu);
            
            header("Location: agregar_productos.php");
            
        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
        
    }
}