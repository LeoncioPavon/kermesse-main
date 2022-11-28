<?php

require_once("conexion.php");
require_once("../entidades/tbl_productos.php");
class dt_tbl_productos extends Conexion
{

    public function listarProducto()
    {
        try {
            $sql = "SELECT * FROM tbl_productos where estado<>3;";
            $result = array();
            $stm = $this->conectar()->prepare($sql);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $tp = new tbl_productos();
                $tp->setIdProducto($r->id_producto);
                $tp->setIdComunidad($r->id_comunidad);
                $tp->setIdCatProducto($r->id_cat_producto);
                $tp->setNombres($r->nombre);
                $tp->setDescripcion($r->descripcion);
                $tp->setCantidad($r->cantidad);
                $tp->setPreciovSugerido($r->preciov_sugerido);
                $tp->setEstado($r->estado);

                $result[] = $tp;
            }
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function guardarProducto(tbl_productos $tp)
    {
        try {
            $sql = "INSERT INTO tbl_productos (id_comunidad, id_cat_producto, nombre, descripcion, cantidad, preciov_sugerido, estado)
            VALUES (?,?,?,?,?,?,1);";
            $query = $this->conectar()->prepare($sql)->execute(
                array(
                    $tp->getIdComunidad(),
                    $tp->getIdCatProducto(),
                    $tp->getNombre(),
                    $tp->getDescripcion(),
                    $tp->getCantidad(),
                    $tp->getPreciovSugerido(),
                )
            );

            var_dump($query);

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function editarProducto(tbl_productos $tu)
    {
        try {
            $sql = 'UPDATE tbl_productos SET id_comunidad = ?, id_cat_producto = ?, nombre = ?, descripcion = ?, cantidad = ?, preciov_sugerido = ? where id_producto = ?';
            $query = $this->conectar()->prepare($sql);
            $query->execute(
                array(
                    $tu->getIdComunidad(),
                    $tu->getIdCatProducto(),
                    $tu->getNombre(),
                    $tu->getDescripcion(),
                    $tu->getCantidad(),
                    $tu->getPreciovSugerido(),
                    $tu->getIdProducto()
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function mostrarProductos($id_producto)
    {
        try {
            $sql = "SELECT * FROM tbl_productos where id_producto = ?;";
            $stm = $this->conectar()->prepare($sql);
            $stm->execute(array($id_producto));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $tu = new tbl_productos();

            $tu->setIdProducto($r->id_producto);
            $tu->setIdComunidad($r->id_comunidad);
            $tu->setIdCatProducto($r->id_cat_producto);
            $tu->setNombres($r->nombre);
            $tu->setDescripcion($r->descripcion);
            $tu->setCantidad($r->cantidad);
            $tu->setPreciovSugerido($r->preciov_sugerido);

            return $tu;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarProducto($id_producto)
    {
        try {
            $sql = "DELETE FROM `dbkermesse`.`tbl_producto` WHERE id_producto = ?;";
            $query = $this->conectar()->prepare($sql);

            $query->execute(
                array(
                    $id_producto
                )
            );

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>