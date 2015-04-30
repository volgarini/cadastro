<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mongodb
 *
 * @author Lucas
 */
if (!class_exists('Banco', false)) {
    require('db\banco.php');
}

class MongoConect extends Banco {

    private $datab;

    public function __construct() {
        parent::__construct();
        $mongo = new MongoClient();
        $mongo->connect();
        $db = parent::getBanco();
        $this->datab = $mongo->$db;
    }

    public function inserir($collection, $dados) {
        return $this->datab->$collection->insert($dados);
    }

    public function buscar($collection) {
        return $this->datab->$collection->find();
    }

    public function buscar_filtro($collection, $filtro) {
        return $this->datab->$collection->findOne($filtro);
    }

    public function apagar($collection) {
        $this->datab->$collection->drop();
    }

}
