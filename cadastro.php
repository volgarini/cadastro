<?php

require( 'bd\pessoa.php');
require( 'bd\contato.php');
require('bd\pessoas_model.php');
require('bd\contatos_model.php');
if (!class_exists('MongoConect', false)) {
    require('bd\mongo\mongodb.php');
}

class Cadastro {

    var $pessoaModel;
    var $contatosModel;

    public function __construct() {
        $this->pessoaModel = new PessoasModel();
        $this->contatosModel = new ContatosModel();
    }

    public function cadastrar($pessoa, $contato) {
        $telefones = $contato->getTelefone();

        //valida se o telefone ja esta cadastrado
        foreach ($telefones as $key => $value) {
            if ($this->contatosModel->validar_telefone($value)) {
                echo '<p>O telefone: ' . $value . ' j&aacute; est&aacute; cadastrado!</p>';
                exit;
            }
        }

        //valida se o email ja esta cadastrado
        if (!$this->pessoaModel->validar_email($pessoa)) {
            $pessoa->setId($this->pessoaModel->inserir($pessoa));
            foreach ($telefones as $key => $value) {
                if (!empty(trim($value))) {
                    $this->contatosModel->inserir(new Contato($value, $pessoa->getId(), $key));
                }
            }

            echo '<p>A pessoa: ' . $pessoa->getNome() . ' cadastrada com sucesso!</p>';
        } else {
            echo '<p>O email: ' . $pessoa->getEmail() . ' j&aacute; est&aacute; cadastrado!</p>';
        }

        $this->pessoaModel->fechar();

        return 0;
    }

    public function cadastrar_mongo($pessoa, $contato) {
        $mongo = new MongoConect();

        $telefones = $contato->getTelefone();
        $row = $pessoa->getDados();
        foreach ($telefones as $key => $value) {
            if (!empty(trim($value))) {
                $telefone = ["Telefone" . $key => $value];
                //valida se o telefone ja esta cadastrado
                if ($mongo->buscar_filtro("pessoas", $telefone)) {
                    echo '<p>O telefone: ' . $value . ' j&aacute; est&aacute; cadastrado!</p>';
                    exit;
                }
                $row = array_merge($row, $telefone);
            }
        }
        
        //verifica se o email ja esta cadastrado
        if (is_null($mongo->buscar_filtro("pessoas", ["email" => $pessoa->getEmail()]))) {
            $mongo->inserir("pessoas", $row);
            echo '<p>A pessoa: ' . $pessoa->getNome() . ' cadastrada com sucesso!</p>';
        } else {
            echo '<p>O email: ' . $pessoa->getEmail() . ' j&aacute; est&aacute; cadastrado!</p>';
        }
    }
}

$pessoa = new Pessoa($_POST["nome"], $_POST["endereco"], $_POST["email"]);
$contato = new Contato(['F' => $_POST["telefone"], 'T' => $_POST["trabalho"], 'C' => $_POST["celular"]], null, null);
$cadastro = new Cadastro();
$cadastro->cadastrar_mongo($pessoa, $contato);
