<?php

class rol_usuario{
    private $id_rol_usuario;
    private $tbl_usuario_id_usuario;
    private $tbl_rol_id_rol;

    public function getIdRolUsuario(){
        return $this->id_rol_usuario;
    }

    public function setIdRolUsuario($id_rol_usuario){
        $this->id_rol_usuario = $id_rol_usuario;
    }

    public function getTblUsuarioIdUsuario($tbl_usuario_id_usuario){
        return $this->tbl_usuario_id_usuario;
    }

    public function setTblUsuarioIdUsuario($tbl_usuario_id_usuario){
        $this->tbl_usuario_id_usuario = $tbl_usuario_id_usuario;
    }

    public function getTblRolIdRol(){
        return $this->tbl_rol_id_rol;
    }

    public function setTblRolIdRol($tbl_rol_id_rol){
        $this->tbl_rol_id_rol = $tbl_rol_id_rol;
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