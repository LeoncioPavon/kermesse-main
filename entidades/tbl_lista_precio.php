<?php

class tbl_lista_precio{
     private $id_lista_precio;
     private $id_kermesse;
     private $nombre;
     private $descripcion;
     private $estado;

     public function getIdListaPrecio(){
        return $this->id_lista_precio;
     }

     public function setIdListaPrecio($id_lista_precio){
        $this->id_lista_precio= $id_lista_precio;
     }

     public function getIdKermesse(){
        return $this->id_Kermesse;
     }

     public function setIdKermesse($id_kermesse){
        $this->id_kermesse = $id_kermesse;
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
        return*/
}
