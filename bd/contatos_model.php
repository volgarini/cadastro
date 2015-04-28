<?php

if (!class_exists('BancoModel', false)) {
    require('banco_model.php');
}

class ContatosModel extends BancoModel {

    public function __construct() {
        parent::__construct();
    }

    public function validar_telefone($telefone) {
        $query = "SELECT id FROM contatos WHERE telefone = '" . $telefone . "'" or die(mysqli_error(parent::getConexao()));
        $conn = parent::getConexao();
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function inserir($contato) {
        $query = "INSERT INTO contatos (pessoa_id, telefone, tipo) VALUES ('" . $contato->getPessoa() . "','" . $contato->getTelefone() . "','" . $contato->getTipo() . "')";
        $stmt = parent::getConexao()->prepare($query);
        $stmt->execute();
        $id = $stmt->insert_id;
        $stmt->close();

        return $id;
    }

}
