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
    
    function __construct($Nombre,$Apellido,$Nickname,$Email,$Pass,$Celular,$Bday,$Address){
        $this->Nombre = $Nombre;
        $this->Apellido = $Apellido;
        $this->Nickname = $Nickname;
        $this->Email = $Email;
        $this->Pass = password_hash($Pass,PASSWORD_DEFAULT); //Encriptar contraseña
        $this->Celular = $Celular;
        $this->Bday = $Bday;
        $this->Address = $Address;
    }

    function printDU (){
        echo "Nombre: ".$this->Nombre."<br>";
        echo "Apellido: ".$this->Apellido."<br>";
        echo "Nickname: ".$this->Nickname."<br>";
        echo "Email: ".$this->Email."<br>";
        echo "Password: ".$this->Pass."<br>";
        echo "Celular: ".$this->Celular."<br>";
        echo "Fecha de nacimiento: ".$this->Bday."<br>";
        echo "Dirección: ".$this->Address."<br>";
    }

    //Evita las vulnerabilidades del sistema a traves de GETTER y SETTER
    function getNombre(){
        return ucwords(strtolower($this->Nombre));
    }
    function getApellido(){
        return ucwords(strtolower($this->Apellido));
    }
    function getNick(){
        return $this->Nickname;
    }
    function getEmail(){
        return trim(ucwords(strtolower($this->Email))); // Evitar espacios en blanco sobre Email
    }
    function getPass(){
        return $this->Pass;
    }
    function getPhone(){
        return $this->Celular;
    }
    function getBday(){
        return $this->Bday;
    }
    function getAddress(){
        return ucfirst(strtolower($this->Address));
    }
}




?>