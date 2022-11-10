<?php

class tbl_producto{
    private $id_producto;
    private $id_comunidad;
    private $id_cat_producto;
    private $nombre;
    private $descripcion;
    private $cantidad;
    private $preciov_sugerido;
    private $estado; 

    public function getIdProducto(){
        return $this->id_producto;
    } 

    public function setIdProducto($id_producto){
        $this->id_producto = $id_producto;
    } 

    public function getIdComunidad(){
        return $this->id_comunidad;
    } 

    public function setIdComunidad($id_comunidad){
        $this->id_comunidad = $id_comunidad;
    } 
    
    public function getIdCatProducto(){
        return $this->id_cat_producto;
    } 

    public function setIdCatProducto($id_cat_producto){
        $this->id_cat_producto = $id_cat_producto;
    }  

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombres($nombre){
        $this->nombre = $nombre;
    }

    public function getDescripcion(){
        return $this->descripcion;
    } 

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    } 

    public function getCantidad(){
        return $this->cantidad;
    } 

    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    } 

    public function getPreciovSugerido(){
        return $this->preciov_sugerido;
    } 

    public function setPreciovSugerido($preciov_sugerido){
        $this->preciov_sugerido = $preciov_sugerido;
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