<?php

require_once("conexion.php");
require_once("../entidades/tbl_categoria_gastos.php");
class dt_tbl_categoria_gastos extends Conexion
{

    public function listarCategoriaGastos()
    {
        try {
            $sql = "SELECT * FROM tbl_categoria_gastos where estado<>3;";
            $result = array();
            $stm = $this->conectar()->prepare($sql);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $tu = new tbl_categoria_gastos();
                $tu->setIdCategoriaGastos($r->id_categoria_gastos);
                $tu->setNombreCategoria($r->nombre_categoria);
                $tu->setDescripcion($r->descripcion);
                $tu->setEstado($r->estado);

                $result[] = $tu;
            }
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function guardarCategoriaGastos(tbl_categoria_gastos $tu)
    {
        try {

            $sql = "INSERT INTO tbl_categoria_gastos (nombre_categoria, descripcion, estado) VALUES 
                    (?,?,1)";
            $query = $this->conectar()->prepare($sql)->execute(
                array(
                    $tu->getNombreCategoria(),
                    $tu->getDescripcion(),
                )
            );

            var_dump($query);

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function editarCategoriaGastos(tbl_categoria_gastos $tu)
    {
        try {
            $sql = "UPDATE tbl_categoria_gastos SET nombre = ?, descripcion = ?, estado = 2 where id_categoria_gastos = ?";
            $query = $this->conectar()->prepare($sql);
            $query->execute(
                array(
                    $tu->getNombreCategoria(),
                    $tu->getDescripcion(),
                    $tu->getIdCategoriaGastos()
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function mostrarCategoriaGastos($id_categoria_gastos)
    {
        try {
            $sql = "SELECT * FROM tbl_categoria_gastos where estado<>3 and id_categoria_gastos = ?;";

            $stm = $this->conectar()->prepare($sql);
            $stm->execute(array($id_categoria_gastos));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $tu = new tbl_categoria_gastos();

            $tu->setIdCategoriaGastos($r->id_categoria_gastos);
            $tu->setNombreCategoria($r->nombre_categoria);
            $tu->setDescripcion($r->descripcion);
            $tu->setEstado($r->estado);

            return $tu;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function eliminarCategoriaGastos($id_categoria_gastos)
    {
        try {
            $sql = "DELETE FROM `dbkermesse`.`tbl_categoria_gastos` WHERE id_categoria_gastos = ?;";
            $query = $this->conectar()->prepare($sql);

            $query->execute(
                array(
                    $id_categoria_gastos
                )
            );

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}