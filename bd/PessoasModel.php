<?php

if (!class_exists('MongoConnect', false)) {
    require('bd\mongo\MongoConnect.php');
}

class PessoasModel extends MongoConnect {

    public function __construct() {
        parent::__construct();
    }

    public function validarPessoa($pessoa) {
        if (trim($pessoa->getNome()) == '') {
            return "<p>Campo Nome &eacute; obrigat&oacute;rio!</p>";
        } elseif (trim($pessoa->getEndereco()) == '') {
            return "<p>Campo Endere&ccedil;o &eacute; obrigat&oacute;rio!</p>";
        } elseif (trim($pessoa->getEmail()) == '') {
            return "<p>Campo Email &eacute; obrigat&oacute;rio!</p>";
        } else {
            return true;
        }
    }

    public function validarTelefones($telefoneF, $telefoneT, $telefoneC) {
        if (empty(trim($telefoneF)) && empty(trim($telefoneT)) && empty(trim($telefoneC))) {
            return "<p>Entre com pelo menos um telefone de contato!";
        }

        if (!is_null($this->buscarFiltro(['telefoneF' => $telefoneF]))) {
            return '<p>O telefone: ' . $telefoneF . ' j&aacute; est&aacute; cadastrado!</p>';
        } elseif (!is_null($this->buscarFiltro(['telefoneT' => $telefoneT]))) {
            return '<p>O telefone: ' . $telefoneT . ' j&aacute; est&aacute; cadastrado!</p>';
        } elseif (!is_null($this->buscarFiltro(['telefoneC' => $telefoneC]))) {
            return '<p>O telefone: ' . $telefoneC . ' j&aacute; est&aacute; cadastrado!</p>';
        }

        return true;
    }

    public function validarEmail($email) {
        if (!is_null($this->buscarFiltro(["email" => $email]))) {
            return '<p>O email: ' . $email . ' j&aacute; est&aacute; cadastrado!</p>';
        }

        return true;
    }

    public function inserir($dados, $collection = 'pessoas') {
        return parent::inserir($dados, $collection);
    }

    public function buscar($collection = 'pessoas') {
        $result = parent::buscar($collection);
//        foreach ($result as $key => $value) {
//            var_dump($value);
//        }
//
//        exit;
    }

    public function buscarFiltro($filtro, $collection = 'pessoas') {
        return parent::buscarFiltro($filtro, $collection);
    }

    public function apagar($collection = 'pessoas') {
        parent::apagar($collection);
//        exit;
    }

}
