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
class MongoConnect {
    private $datab;
    public function __construct() {
        $mongo = new MongoClient();
        $mongo->connect();
        $db = 'cadastro';
        $this->datab = $mongo->$db;
    }

    protected function inserir($dados, $collection) {
        return $this->datab->$collection->insert($dados);
    }

    protected function buscar($collection) {
        return $this->datab->$collection->find();
    }

    protected function buscarFiltro($filtro, $collection) {
        return $this->datab->$collection->findOne($filtro);
    }

    protected function apagar($collection) {
        $this->datab->$collection->drop();
    }

}
