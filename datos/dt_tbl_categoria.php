<?php

require_once("conexion.php");
require_once("../entidades/tbl_categoria_producto.php");
class dt_tbl_categoria extends Conexion
{

    public function listarCategoria()
    {
        try {
            $sql = "SELECT * FROM tbl_categoria_producto where estado<>3;";
            $result = array();
            $stm = $this->conectar()->prepare($sql);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $tu = new tbl_categoria_producto();
                $tu->setIdCategoriaProducto($r->id_categoria_producto);
                $tu->setNombre($r->nombres);
                $tu->setDescripcion($r->descripcion);
                $tu->setEstado($r->estado);

                $result[] = $tu;
            }
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function guardarCategoria(tbl_categoria_producto $tu)
    {
        try 
        {
            
            $sql = "INSERT INTO tbl_categoria_producto (nombre, descripcion, estado) VALUES 
                    (?,?,1)";
            $query = $this->conectar()->prepare($sql)->execute(array(
                $tu->getNombre(), 
                $tu->getDescripcion(), 
            ));

            var_dump($query);
            
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
        
    }

}