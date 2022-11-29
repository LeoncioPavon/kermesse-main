<?php
require_once('../entidades/tbl_productos.php');
require_once("../datos/dt_tbl_productos.php");

class productoController
{
    private $dt_producto;

    public function __construct()
    {
        $this->dt_producto = new dt_tbl_productos();
    }
    public static function guardarProductos()
    {
        try {
            $id_comunidad = $_REQUEST['id_comunidad'];
            $id_cat_producto = $_REQUEST['id_cat_producto'];
            $nombre = $_REQUEST['nombre'];
            $descripcion = $_REQUEST['descripcion'];
            $cantidad = $_REQUEST['cantidad'];
            $preciov_sugerido = $_REQUEST['precio'];

            $tp = new tbl_productos();
            $dtu = new dt_tbl_productos();

            $tp->setIdComunidad($id_comunidad);
            $tp->setIdCatProducto($id_cat_producto);
            $tp->setNombres($nombre);
            $tp->setDescripcion($descripcion);
            $tp->setCantidad($cantidad);
            $tp->setPreciovSugerido($preciov_sugerido);

            $dtu->guardarProducto($tp);

            header("Location: agregar_productos.php");

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function editarProducto()
    {
        try {
            $id_producto = $_REQUEST['id_producto'];
            $id_comunidad = $_REQUEST['id_comunidad'];
            $id_cat_producto = $_REQUEST['id_cat_producto'];
            $nombre = $_REQUEST['nombre'];
            $descripcion = $_REQUEST['descripcion'];
            $cantidad = $_REQUEST['cantidad'];
            $preciov_sugerido = $_REQUEST['preciov_sugerido'];

            $tu = new tbl_productos();
            $dtu = new dt_tbl_productos();

            $tu->setIdProducto($id_producto);
            $tu->setNombres($nombre);
            $tu->setDescripcion($descripcion);
            $tu->setCantidad($cantidad);
            $tu->setPreciovSugerido($preciov_sugerido);

            $dtu->editarProducto($tu);


            header("Location: parroquia.php");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public static function eliminarProducto()
    {
        try {
            $id = $_REQUEST['id_producto'];

            $dtu = new dt_tbl_productos();

            $dtu->editarProducto($id);

            header("Location: producto.php");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}