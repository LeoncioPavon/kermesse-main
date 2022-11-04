<?php

class tbl_comunidad{
    private $id_comunidad;
    private $nombre;
    private $responsable;
    private $desc_contribucion;
    private $estado;

    public function getIdComunidad(){
        return $this->id_comunidad;
    }

    public function setIdComunidad($id_comunidad){
        $this->id_comunidad = $id_comunidad;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getResponsable(){
        return $this->responsable;
    }

    public function setResponsable($responsable){
        $this->responsable = $responsable;
    }

    public function getDescContribucion(){
        return $this->desc_contribucion;
    }

    public function setDescContribucion($desc_contribucion){
        $this->desc_contribucion = $desc_contribucion;
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