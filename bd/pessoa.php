<?php

class Pessoa{
    
    private $id;
    private $nome;
    private $endereco;
    private $email;

    public function __construct($nome, $endereco, $email) {
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->email = $email;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        return $this->id = $id;
    }
    
    public function getDados() {
        return get_object_vars($this);
    }

}
