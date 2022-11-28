<?php

require_once("conexion.php");
require_once("../entidades/rol_usuario.php");
require_once("../entidades/vw_usuario_rol.php");
class dt_rol_usuario extends Conexion
{
    public function listarRolUsuario($id_usuario)
    {
        try {
            $sql = "SELECT id_rol, rol_descripcion FROM vw_usuario_rol where id_usuario = ?;";
            $result = array();
            $stm = $this->conectar()->prepare($sql);
            $stm->execute(array($id_usuario));

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $rol_usuario = new vw_usuario_rol();

                $rol_usuario->setIdRol($r->id_rol);
                $rol_usuario->setRolDescripcion($r->rol_descripcion);


                $result[] = $rol_usuario;
            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function asignarRolUsuario(rol_usuario $ru)
    {
        try {

            $sql = "INSERT INTO rol_usuario (tbl_usuario_id_usuario, tbl_rol_id_rol) VALUES 
                    (?,?)";
            $query = $this->conectar()->prepare($sql)->execute(
                array(
                    $ru->getTblUsuarioIdUsuario(),
                    $ru->getTblRolIdRol()
                )
            );

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