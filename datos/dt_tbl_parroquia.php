<?php

require_once("conexion.php");
require_once("../entidades/tbl_parroquia.php");
class dt_tbl_parroquia extends Conexion{

    public function listarParroquia()
    {    
        try
        {
            $sql = "SELECT * FROM tbl_parroquia;";
            $result = array();
            $stm = $this->conectar()->prepare($sql);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $tu = new tbl_parroquia();
                $tu->setIdParroquia($r->idParroquia);
                $tu->setNombre($r->nombre);
                $tu->setDireccion($r->direccion);
                $tu->setTelefono($r->telefono);
                $tu->setParroco($r->parroco);
                $tu->setLogo($r->logo);
                $tu->setSitioWeb($r->sitio_web);

                $result[] = $tu;
            }
            return $result;
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function guardarParroquia(tbl_parroquia $tu)
    {
        try 
        {
            
            $sql = "INSERT INTO `dbkermesse`.`tbl_parroquia` (`nombre`, `direccion`, `telefono`, `parroco`, `logo`, `sitio_web`)
             VALUES (?, ?, ?, ?, ?, ?);";
            $query = $this->conectar()->prepare($sql)->execute(array(
                $tu->getNombre(), 
                $tu->getDireccion(), 
                $tu->getTelefono(), 
                $tu->getParroco(), 
                $tu->getLogo(),
                $tu->getSitioWeb(),
            ));
            var_dump($query);
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
        
    }

    public function editarParroquia(tbl_parroquia $tu)
    {
        try 
        {
            $sql = 'UPDATE tbl_parroquia SET nombre = ?, direccion = ?, telefono = ?, parroco = ?, logo = ?, sitio_web = ? where idParroquia = ?';
            $query = $this->conectar()->prepare($sql);
            $query->execute(array(
                $tu->getNombre(),
                $tu->getDireccion(),
                $tu->getTelefono(),
                $tu->getParroco(),
                $tu->getLogo(),
                $tu->getSitioWeb(),
                $tu->getIdParroquia()
            ));
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
    public function mostrarParroquia($idParroquia)
    {
        try 
        {
            $sql = "SELECT * FROM tbl_parroquia where idParroquia = ?;"; 
            $stm = $this->conectar()->prepare($sql);
            $stm->execute(array($idParroquia));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $tu = new tbl_parroquia();

            $tu->setIdParroquia($r->idParroquia);
            $tu->setNombre($r->nombre);
            $tu->setDireccion($r->direccion);
            $tu->setTelefono($r->telefono);
            $tu->setParroco($r->parroco);
            $tu->setLogo($r->pwd);
            $tu->setSitioWeb($r->sitio_web);

            return $tu;
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function eliminarParroquia($idParroquia)
    {
        try 
        {
            $sql = "DELETE FROM `dbkermesse`.`tbl_parroquia` WHERE idParroquia = ?;";
            $query = $this->conectar()->prepare($sql);
            
            $query->execute(array(
                $idParroquia
            ));
            
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
?>