<?php

class tbl_categoria_producto{
    private $id_categoria_producto;
    private $nombre;
    private $descripcion;
    private $estado;

    public function getIdCategoriaProducto(){
        return $this->id_categoria_producto;
    }

    public function setIdCategoriaProducto($id_categoria_producto){
        $this->id_categoria_producto = $id_categoria_producto;
    } 

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    } 

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

     //Otro método
    /*
    public function __GET($k)
    { 
        return $this->$k; 
    }
	public function __SET($k, $v)
    { 
        return $this->$k = $v; 
    } */
}