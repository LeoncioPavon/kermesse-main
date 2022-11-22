<?php

require_once("conexion.php");
require_once("../entidades/tbl_comunidad.php");
class dt_tbl_comunidad extends Conexion
{

    public function listarComunidadPrueba()
    {    
        try
        {
            $sql = "SELECT id_comunidad, nombre FROM tbl_comunidad where estado<>3;";
            $result = array();
            $stm = $this->conectar()->prepare($sql);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $ta = new tbl_comunidad();
                $ta->setIdComunidad($r->id_comunidad);
                $ta->setNombre($r->nombre);
                $ta->setEstado($r->estado);

                $result[] = $ta;
            }
            return $result;
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
    public function listarComunidad()
    {    
        try
        {
            $sql = "SELECT * FROM tbl_comunidad where estado<>3;";
            $result = array();
            $stm = $this->conectar()->prepare($sql);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $tu = new tbl_comunidad();
                $tu->setIdComunidad($r->id_comunidad);
                $tu->setNombre($r->nombre);
                $tu->setResponsable($r->responsable);
                $tu->setDescContribucion($r->desc_contribucion);
                $tu->setEstado($r->estado);

                $result[] = $tu;
            }
            return $result;
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function guardarComunidad(tbl_comunidad $tu)
    {
        try 
        {
            
            $sql = "INSERT INTO tbl_comunidad (nombre, responsable, desc_contribucion, estado) VALUES 
                    (?,?,?,1)";
            $query = $this->conectar()->prepare($sql)->execute(array(
                $tu->getNombre(), 
                $tu->getResponsable(), 
                $tu->getDescContribucion(), 
            ));

            var_dump($query);
            
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
        
    }
    public function editarComunidad(tbl_comunidad $tu)
    {
        try 
        {
            $sql = "UPDATE tbl_comunidad SET nombre = ?, responsable = ?, desc_contribucion = ?, estado = 2 where id_comunidad = ?";
            $query = $this->conectar()->prepare($sql);
            $query->execute(array(
                $tu->getNombre(),
                $tu->getResponsable(),
                $tu->getDescContribucion(),
                $tu->getIdComunidad()
            ));
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function mostrarComunidad($id_comunidad)
    {
        try 
        {
            $sql = "SELECT * FROM tbl_comunidad where estado<>3 and id_comunidad = ?;"; 
            //$result = array(); 
            $stm = $this->conectar()->prepare($sql);
            $stm->execute(array($id_comunidad));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $tu = new tbl_comunidad();

            $tu->setIdComunidad($r->id_comunidad);
            $tu->setNombre($r->nombre);
            $tu->setResponsable($r->responsable);
            $tu->setDescContribucion($r->desc_contribucion);
            $tu->setEstado($r->estado);

            //$result[] = $tu;   
            return $tu;
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function eliminarComunidad($id_comunidad)
    {
        try 
        {
            $sql = "DELETE FROM `dbkermesse`.`tbl_comunidad` WHERE id_comunidad = ?;";
            $query = $this->conectar()->prepare($sql);
            
            $query->execute(array(
                $id_comunidad
            ));
            
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

}
?>