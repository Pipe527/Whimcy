<?php

class Usuarios {

    private $Nombre;
    private $Apellido;
    private $Nickname;
    private $Email;
    private $Pass;
    private $Celular;
    private $Bday;
    private $Address;
    
    function __construct(){
        $this->Nombre = $Nombre;
        $this->Apellido = $Apellido;
        $this->Nickname = $Nickname;
        $this->Email = $Email;
        $this->Pass = $Pass;
        $this->Celular = $Celular;
        $this->Bday = $Bday;
        $this->Address = $Address;
    }

    function printDU (){
        echo "Nombre: ".$this->Nombre."<br>";
    }

    function getNombre(){
        return $this->Nombre;
    }
    function getApellido(){
        return $this->Apellido;
    }
    function getNick(){
        return $this->Nickname;
    }
    function getEmail(){
        return $this->Email;
    }
    function getPass(){
        return $this->Pass;
    }
    function getPhone(){
        return $this->Celular;
    }
    function getBday(){
        return $this->getBday;
    }
    function getAddress(){
        return $this->Address;
    }
}




?>