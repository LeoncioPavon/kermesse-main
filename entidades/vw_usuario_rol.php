<?php

class vw_usuario_rol
{
    private $id_rol_usuario;
    private $id_usuario;
    private $nombres;
    private $apellidos;
    private $usuario;
    private $email;
    private $rol_descripcion;
    private $id_rol;

    public function getIdRolUsuario(){
        return $this->id_rol_usuario;
    }

    public function setIdRolUsuario($id_rol_usuario){
        $this->id_rol_usuario = $id_rol_usuario;
    }

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
    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function getRolDescripcion(){
        return $this->rol_descripcion;
    }

    public function setRolDescripcion($rol_descripcion){
        $this->rol_descripcion = $rol_descripcion;
    }
    public function getIdRol(){
        return $this->id_rol;
    }

    public function setIdRol($id_rol){
        $this->id_rol = $id_rol;
    }
}