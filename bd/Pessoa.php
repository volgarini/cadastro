<?php

class Pessoa{
    
    private $id;
    private $nome;
    private $endereco;
    private $email;
    private $telefoneF;
    private $telefoneT;
    private $telefoneC;
    public function __construct($nome, $endereco, $email, $telefoneF, $telefoneT, $telefoneC) {
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->email = $email;
        $this->telefoneF = $telefoneF;
        $this->telefoneT = $telefoneT;
        $this->telefoneC = $telefoneC;
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
    function getTelefoneF() {
        return $this->telefoneF;
    }

    function getTelefoneT() {
        return $this->telefoneT;
    } 

    function getTelefoneC() {
        return $this->telefoneC;
    }

    function setTelefoneF($telefoneF) {
        $this->telefoneF = $telefoneF;
    }

    function setTelefoneT($telefoneT) {
        $this->telefoneT = $telefoneT;
    }

    function setTelefoneC($telefoneC) {
        $this->telefoneC = $telefoneC;
    }

        public function getDados() {
        return get_object_vars($this);
    }

}
