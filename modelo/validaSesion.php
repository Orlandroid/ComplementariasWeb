<?php

class Session{
    
    private $usuario;
    private $activo;
    private $habilita;
    private $tipo;

    public function setUsuario($user){
        $this->usuario=$user;
    }
    
    public function getUsuario(){
        return $this->usuario;
    }
    
    public function setActivo($act){
        $this->activo=$act;
    }
    
    public function getActivo(){
        return $this->activo;
    } 

    public function setHabilita($param){
        $this->habilita=$param;
    }
    
    public function getHabilita(){
        return $this->habilita;
    }
    
    public function setTipo($type){
        $this->tipo=$type;
    }
    
    public function getTipo(){
        return $this->tipo;
    } 


    public function __construct()
    {
        if(!isset($_SESSION)) 
        { 
            session_start();
            if (!(isset($_SESSION['user'])))
                header("Location: index.php");
            else {
                $_SESSION['habilita'] = '';
                $this->setUsuario($_SESSION['user']);
                $this->setActivo($_SESSION['activo']);
                $this->setHabilita($_SESSION['habilita']);
                $this->setTipo($_SESSION['tipo']);
                if ($this->tipo == 'administrador')  $this->setHabilita('');
                else    $this->setHabilita('disabled');
            }
        
        }              
    }


}
?>