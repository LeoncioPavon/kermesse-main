<?php

class tbl_kermesse{
    private $id_kermesse;
    private $idParroquia;
    private $nombre;
    private $fInicio;
    private $fFinal;
    private $descripcion;
    private $estado;
    private $usuario_creacion;
    private $fecha_creacion;
    private $usuario_modificacion;
    private $fecha_modificacion;
    private $usuario_eliminacion;
    private $fecha_eliminacion;

    public function getIdKermesse(){
        return $this->id_kermesse;
    }

    public function setIdKermesse($id_kermesse){
        $this->id_Kermesse = $id_kermesse;
    }

    public function getIdParroquia(){
        return $this->idParroquia;
    }

    public function setIdParroquia($idParroquia){
        $this->IdParroquia = $idParroquia;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getFInicio(){
        return $this->fInicio;
    }

    public function setFInicio($fInicio){
        $this->fInicio = $fInicio;
    }

    public function getFFINAL(){
        return $this->fFinal;
    }

    public function setFFINAL($fFinal){
        $this->fFinal = $fFinal;
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

    public function getUsuarioCreacion(){
        return $this->usuario_creacion;
    }

    public function setUsuarioCreacion($usuario_creacion){
        $this->usuario_creacion = $usuario_creacion;
    }

    public function getFechaCreacion(){
        return $this->fecha_creacion;
    }

    public function setFechaCreacion($fecha_creacion){
         $this->fecha_creacion = $fecha_creacion;
    }

    public function getUsuarioModificacion(){
        return $this->usuario_modificacion;
    }

    public function setUsuaruioModificacion($usuario_modificacion){
        $this->usuario_modificacion = $usuario_modificacion;
    }

    public function getFechaModificacion(){
        return $this->fecha_modificacion;
    }

    public function setFechaModificacion($fecha_modificacion){
        $this->fecha_modificacion = $fecha_modificacion;
    }
    
    public function getUsuarioEliminacion(){
        return $this->usuario_eliminacion;
    }

    public function setUsuarioEliminacion($usuario_eliminacion){
        $this->usuario_eliminacion = $usuario_eliminacion;
    }

    public function getFechaEliminacion(){
        return $this->fecha_eliminacion;
    }

    public function setFechaEliminacion($fecha_eliminacion){
        $this->fecha_eliminacion = $fecha_eliminacion;
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