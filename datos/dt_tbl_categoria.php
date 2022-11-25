<?php

require_once("conexion.php");
require_once("../entidades/tbl_categoria_producto.php");
class dt_tbl_categoria extends Conexion
{

    public function listarCategoriaPrueba()
    {
        try {
            $sql = "SELECT id_categoria_producto, nombre FROM tbl_categoria_producto where estado<>3;";
            $result = array();
            $stm = $this->conectar()->prepare($sql);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $tu = new tbl_categoria_producto();
                $tu->setIdCategoriaProducto($r->id_categoria_producto);
                $tu->setNombre($r->nombre);
                $tu->setEstado($r->estado);

                $result[] = $tu;
            }
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

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
                $tu->setNombre($r->nombre);
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

    public function editarCategoria(tbl_categoria_producto $tu)
    {
        try 
        {
            $sql = "UPDATE tbl_categoria_producto SET nombre = ?, descripcion = ?, estado = 2 where id_categoria_producto = ?";
            $query = $this->conectar()->prepare($sql);
            $query->execute(array(
                $tu->getNombre(),
                $tu->getDescripcion(),
                $tu->getIdCategoriaProducto()
            ));
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function mostrarCategoria($id_categoria_producto)
    {
        try 
        {
            $sql = "SELECT * FROM tbl_categoria_producto where estado<>3 and id_categoria_producto = ?;"; 
            //$result = array(); 
            $stm = $this->conectar()->prepare($sql);
            $stm->execute(array($id_categoria_producto));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $tu = new tbl_categoria_producto();

            $tu->setIdCategoriaProducto($r->id_categoria_producto);
            $tu->setNombre($r->nombre);
            $tu->setDescripcion($r->descripcion);
            $tu->setEstado($r->estado);

            //$result[] = $tu;   
            return $tu;
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
    public function eliminarCategoria($id_categoria_producto)
    {
        try 
        {
            $sql = "DELETE FROM `dbkermesse`.`tbl_categoria_producto` WHERE id_categoria_producto = ?;";
            $query = $this->conectar()->prepare($sql);
            
            $query->execute(array(
                $id_categoria_producto
            ));
            
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

}