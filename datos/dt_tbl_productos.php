<?php

require_once("conexion.php");
require_once("../entidades/tbl_productos.php");
class dt_tbl_productos extends Conexion{

    public function listarProducto()
    {    
        try
        {
            $sql = "SELECT * FROM tbl_productos where estado<>3;";
            $result = array();
            $stm = $this->conectar()->prepare($sql);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $tp = new tbl_productos();
                $tp->setIdProducto($r->id_producto);
                $tp->setNombres($r->nombre);
                $tp->setDescripcion($r->descripcion);
                $tp->setPreciovSugerido($r->preciov_sugerido);
                $tp->setEstado($r->estado);

                $result[] = $tp;
            }
            return $result;
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function guardarProducto(tbl_productos $tp)
    {
        try 
        {
            $sql = "INSERT INTO tbl_productos (nombre, descripcion, cantidad, preciov_sugerido, estado)
            VALUES (?,?,?,?,1);";
            $query = $this->conectar()->prepare($sql)->execute(array(
                $tp->getNombre(), 
                $tp->getDescripcion(), 
                $tp->getCantidad(), 
                $tp->getPreciovSugerido(),
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