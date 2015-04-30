<?php
class Banco {

    private $servidor;
    private $usuario;
    private $senha;
    private $banco;

    public function __construct() {
        $this->servidor = 'localhost';
        $this->usuario = 'root';
        $this->senha = '';
        $this->banco = 'cadastro';
    }

    public function conectar() {
        return new mysqli($this->servidor, $this->usuario, $this->senha, $this->banco);
    }

    public function getServidor(){
        return $this->servidor;
    }
    
    public function getBanco(){
        return $this->banco;
    }
}