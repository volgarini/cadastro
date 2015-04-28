<?php
class Contato {

    private $telefone;
    private $pessoa;
    private $tipo;

    public function __construct($telefone, $pessoa, $tipo) {
        $this->telefone = $telefone;
        $this->pessoa = $pessoa;
        $this->tipo = $tipo;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getPessoa() {
        return $this->pessoa;
    }
    
    public function getTipo() {
        return $this->tipo;
    }

}
