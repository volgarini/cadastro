<?php

if (!class_exists('BancoModel', false)) {
    require('banco_model.php');
}

class PessoasModel extends BancoModel {

    public function __construct() {
        parent::__construct();
    }

    public function validar_email($pessoa) {
        $query = "SELECT id FROM pessoas WHERE email = '" . $pessoa->getEmail() . "'" or die(mysqli_error(parent::getConexao()));
        $conn = parent::getConexao();
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function inserir($pessoa) {
        $query = "INSERT INTO pessoas (nome, endereco, email) VALUES ('" . $pessoa->getNome() . "','" . $pessoa->getEndereco() . "','" . $pessoa->getEmail() . "')";
        $stmt = parent::getConexao()->prepare($query);
        $stmt->execute();
        $id = $stmt->insert_id;
        $stmt->close();

        return $id;
    }

}
