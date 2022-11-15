<?php

require_once("conexion.php");
require_once("../entidades/tbl_usuario.php");
class dt_tbl_usuario extends Conexion{

    public function listarUsuario()
    {    
        try
        {
            $sql = "SELECT * FROM tbl_usuario where estado<>3;";
            $result = array();
            $stm = $this->conectar()->prepare($sql);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $tu = new tbl_usuario();
                $tu->setIdUsuario($r->id_usuario);
                $tu->setNombres($r->nombres);
                $tu->setApellidos($r->apellidos);
                $tu->setEmail($r->email);
                $tu->setUsuario($r->usuario);
                $tu->setPwd($r->pwd);
                $tu->setEstado($r->estado);

                $result[] = $tu;
            }
            return $result;
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function guardarUsuario(tbl_usuario $tu)
    {
        try 
        {
            
            $sql = "INSERT INTO tbl_usuario (nombres, apellidos, email, usuario, pwd, estado) VALUES 
                    (?,?,?,?,?,1)";
            $query = $this->conectar()->prepare($sql)->execute(array(
                $tu->getNombres(), 
                $tu->getApellidos(), 
                $tu->getEmail(), 
                $tu->getUsuario(), 
                $tu->getPwd()));

            var_dump($query);
            
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
        
    }

    public function editarUsuario(tbl_usuario $tu)
    {
        try 
        {
            $sql = 'UPDATE tbl_usuario SET nombres = ?, apellidos = ?, email = ?, usuario = ?, pwd = ?, estado = 2 where id_usuario = ?';
            $query = $this->conectar()->prepare($sql);
            $query->execute(array(
                $tu->getNombres(),
                $tu->getApellidos(),
                $tu->getEmail(),
                $tu->getUsuario(),
                $tu->getPwd(),
                $tu->getIdUsuario()
            ));
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
    public function mostrarUsuario($id_usuario)
    {
        try 
        {
            $sql = "SELECT * FROM tbl_usuario where estado<>3 and id_usuario = ?;"; 
            //$result = array(); 
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

            //$result[] = $tu;   
            return $tu;
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
?>