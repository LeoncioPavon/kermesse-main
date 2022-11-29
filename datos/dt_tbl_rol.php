<?php

require_once("conexion.php");
require_once("../entidades/tbl_rol.php");
class dt_tbl_rol extends Conexion
{
    public function listarRol()
    {
        try {
            $sql = "SELECT * FROM tbl_rol where estado<>3;";
            $result = array();
            $stm = $this->conectar()->prepare($sql);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $rol = new tbl_rol();

                $rol->setIdRol($r->id_rol);
                $rol->setRolDescripcion($r->rol_descripcion);
                $rol->setEstado($r->estado);

                $result[] = $rol;
            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function guardarRol(tbl_rol $tu)
    {
        try {

            $sql = "INSERT INTO tbl_rol (rol_descripcion, estado) VALUES 
                    (?,1)";
            $query = $this->conectar()->prepare($sql)->execute(
                array(
                    $tu->getRolDescripcion()
                )
            );

            var_dump($query);

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function editarRol(tbl_rol $tu)
    {
        try {
            $sql = 'UPDATE tbl_rol SET rol_descripcion = ?, estado = 1 where id_rol = ?';
            $query = $this->conectar()->prepare($sql);
            $query->execute(
                array(
                    $tu->getRolDescripcion(),
                    $tu->getIdRol()
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function mostrarRol($id_rol)
    {
        try {
            $sql = "SELECT * FROM tbl_rol where estado<>3 and id_rol=?;";
            $stm = $this->conectar()->prepare($sql);
            $stm->execute(array($id_rol));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $tu = new tbl_rol();

            $tu->setIdRol($r->id_rol);
            $tu->setRolDescripcion($r->rol_descripcion);
            $tu->setEstado($r->estado);

            return $tu;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarRol($id_rol)
    {
        try {
            $sql = "DELETE FROM `dbkermesse`.`tbl_rol` WHERE id_rol = ?;";
            $query = $this->conectar()->prepare($sql);

            $query->execute(
                array(
                    $id_rol
                )
            );

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
?>