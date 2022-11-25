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
            $nombre = $_REQUEST['nombre'];
            $descripcion = $_REQUEST['descripcion'];
            $cantidad = $_REQUEST['cantidad'];
            $preciov_sugerido = $_REQUEST['precio'];
            
            $tp = new tbl_productos();
            $dtu = new dt_tbl_productos();
            
            $tp->setNombres($nombre);
            $tp->setDescripcion($descripcion);
            $tp->setCantidad($cantidad);
            $tp->setPreciovSugerido($preciov_sugerido);

            $dtu->guardarProducto($tp);
            
            header("Location: agregar_productos.php");
            
        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
        
    }
}