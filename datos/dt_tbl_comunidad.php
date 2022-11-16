<?php

require_once("conexion.php");
require_once("../entidades/tbl_comunidad.php");
class dt_tbl_comunidad extends Conexion{

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

}
?>