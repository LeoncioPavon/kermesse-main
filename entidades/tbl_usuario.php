<?php

class tbl_usuario{
    private $id_usuario;
    private $nombres;
    private $apellidos;
    private $email;
    private $estado;

    public function getIdUsuario(){
        return $this->id_usuario;
    }
    public function setIdUsuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }

    public function getNombres(){
        return $this->nombres;
    }

    public function setNombres($nombres){
        $this->nombres = $nombres;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    /*OTRO METODO*/
    //OPCIONAL FUNCTIONA PARA TODOS LOS ATRIBUTOS DE LA CLASE

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