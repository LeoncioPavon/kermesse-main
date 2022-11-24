<?php

class tbl_parroquia{
    private $idParroquia;
    private $nombre;
    private $direccion;
    private $telefono;
    private $parroco;
    private $logo;
    private $sitio_web;

    public function getIdParroquia(){
        return $this->idParroquia;
    }

    public function setIdParroquia($idParroquia){
        $this->idParroquia = $idParroquia;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function getParroco(){
        return $this->parroco;
    }

    public function setParroco($parroco){
        $this->parroco = $parroco;
    }

    public function getLogo(){
        return $this->logo;
    }

    public function setLogo($logo){
        $this->logo = $logo;
    }

    public function getSitioWeb(){
        return $this->sitio_web;
    }

    public function setSitioWeb($sitio_web){
        $this->sitio_web = $sitio_web;
    }
}