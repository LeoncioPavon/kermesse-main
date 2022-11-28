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
    public function guardarUsuario(tbl_usuario $tu)
    {
        try {

            $sql = "INSERT INTO tbl_usuario (nombres, apellidos, email, usuario, pwd, estado) VALUES 
                    (?,?,?,?,?,1)";
            $query = $this->conectar()->prepare($sql)->execute(
                array(
                    $tu->getNombres(),
                    $tu->getApellidos(),
                    $tu->getEmail(),
                    $tu->getUsuario(),
                    $tu->getPwd()
                )
            );

            var_dump($query);

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function mostrarUsuario($id_usuario)
    {
        try {
            $sql = "SELECT * FROM tbl_usuario where estado<>3 and id_usuario=?;";
            $stm = $this->conectar()->prepare($sql);
            $stm->execute(array($id_usuario));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $tu = new tbl_usuario();

            $tu->setIdUsuario($r->id_usuario);
            $tu->setNombres($r->nombres);
            $tu->setApellidos($r->apellidos);
            $tu->setEmail($r->email);
            $tu->setUsuario($r->usuario);
            $tu->setPwd($r->pwd);
            $tu->setEstado($r->estado);

            return $tu;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
?>