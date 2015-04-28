<?php
class Banco {

    var $servidor;
    var $usuario;
    var $senha;
    var $banco;

    public function __construct() {
        $this->servidor = 'localhost';
        $this->usuario = 'root';
        $this->senha = '';
        $this->banco = 'cadastro';
    }

    public function conectar() {
        return new mysqli($this->servidor, $this->usuario, $this->senha, $this->banco);
    }

}

//$banco = new Banco();
//$banco->conectar();
