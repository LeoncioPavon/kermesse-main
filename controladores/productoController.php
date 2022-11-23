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
            $preciov_sugerido = $_REQUEST['preciov_sugerido'];
            
            $tu = new tbl_producto();
            $dtu = new dt_tbl_productos();
            
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