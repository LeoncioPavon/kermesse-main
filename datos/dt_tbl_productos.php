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
                $tu = new tbl_producto();
                $tu->setIdProducto($r->id_producto);
                $tu->setNombres($r->nombre);
                $tu->setDescripcion($r->descripcion);
                $tu->setPreciovSugerido($r->preciov_sugerido);
                $tu->setEstado($r->estado);

                $result[] = $tu;
            }
            return $result;
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function guardarProducto(tbl_producto $tu)
    {
        try 
        {
            
            $sql = "INSERT INTO tbl_productos (id_comunidad, id_cat_producto, nombre, descripcion, cantidad, preciov_sugerido, estado) VALUES 
                    (?,?,?,?,?,?,1)";
            $query = $this->conectar()->prepare($sql)->execute(array(
                $tu->getIdComunidad(),
                $tu->getIdCatProducto(),
                $tu->getNombre(), 
                $tu->getDescripcion(), 
                $tu->getCantidad(), 
                $tu->getPreciovSugerido()
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