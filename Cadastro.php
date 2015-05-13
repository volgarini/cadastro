<?php

if (!class_exists('Pessoa', false)) {
    require( 'bd\Pessoa.php');
}

if (!class_exists('PessoasModel', false)) {
    require( 'bd\PessoasModel.php');
}

if (!class_exists('MongoConnect', false)) {
    require('bd\mongo\MongoConnect.php');
}

class Cadastro {

    var $pessoaModel;

    public function __construct() {
        $this->pessoaModel = new PessoasModel();
    }

    public function cadastrarMongo($pessoa) {
        $valido = $this->pessoaModel->validarPessoa($pessoa);

        if ($valido !== true) {
            return $valido;
        }
        
        $valido = $this->pessoaModel->validarTelefones($pessoa->getTelefoneF(), $pessoa->getTelefoneT(), $pessoa->getTelefoneC());
        if ($valido !== true) {
            return $valido;
        }

        $valido = $this->pessoaModel->validarEmail($pessoa->getEmail());

        if ($valido === true) {
            $this->pessoaModel->inserir($pessoa->getDados());
            return '<p>A pessoa: ' . $pessoa->getNome() . ' foi cadastrada com sucesso!';
        } else {
            return $valido;
        }
    }

}
