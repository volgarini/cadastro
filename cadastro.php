<?php

require( 'bd\pessoa.php');
require( 'bd\contato.php');
require('bd\pessoas_model.php');
require('bd\contatos_model.php');

class Cadastro {

    var $pessoaModel;
    var $contatosModel;

    public function __construct() {
        $this->pessoaModel = new PessoasModel();
        $this->contatosModel = new ContatosModel();
    }

    public function cadastrar($pessoa, $contato) {
        $telefones = $contato->getTelefone();

//        var_dump($telefones);
//        exit;
        //valida se o telefone ja esta cadastrado
        foreach ($telefones as $key => $value) {
            if ($this->contatosModel->validar_telefone($value)){
                echo '<p>O telefone: ' . $value . ' j&aacute; est&aacute; cadastrado!</p>';
                exit;
            }
        }

        //valida se o email ja esta cadastrado
        if (!$this->pessoaModel->validar_email($pessoa)) {
            $pessoa->setId($this->pessoaModel->inserir($pessoa));
            foreach ($telefones as $key => $value) {
                $this->contatosModel->inserir(new Contato($value, $pessoa->getId(), $key));
            }
            
            echo '<p>A pessoa: ' . $pessoa->getNome() . ' cadastrada com sucesso!</p>';
        } else {
            echo '<p>O email: ' . $pessoa->getEmail() . ' j&aacute; est&aacute; cadastrado!</p>';
        }

        $this->pessoaModel->fechar();

        return 0;
    }

}

$pessoa = new Pessoa($_POST["nome"], $_POST["endereco"], $_POST["email"]);
$contato = new Contato(['F' => $_POST["telefone"], 'T' => $_POST["trabalho"], 'C' => $_POST["celular"]], $pessoa, null);
$cadastro = new Cadastro();
$cadastro->cadastrar($pessoa, $contato);
