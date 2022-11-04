<?php

class tbl_rol{
    private $id_rol;
    private $rol_descripcion;
    private $estado; 

    public function getIdRol(){
        return $this->id_rol;
    } 

    public function setIdRol($id_rol){
        $this->id_rol = $id_rol;
    } 

    public function getRolDescripcion(){
        return $this->rol_descripcion;
    } 

    public function setRolDescripcion($rol_descripcion){
        $this->rol_descripcion = $rol_descripcion;
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