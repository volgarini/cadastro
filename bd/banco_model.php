<?php

if (!class_exists('Banco', false)){ 
    require('banco.php');
}


class BancoModel {

    private $conexao;
    private $banco = null;

    public function __construct() {
        if (is_null($this->banco)) {
            $this->banco = new Banco();
            $this->conexao = $this->banco->conectar();
        }
    }

    public function fechar() {
        $this->conexao->close();
    }

    public function getConexao() {
        return $this->conexao;
    }

}
