<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes;

/**
 * Description of Eventos
 *
 * @author PC
 */
class Eventos extends \database\connect{
    
    public function __construct() {
        
    }
    private function buscarEventos($tabela){
       $buscar = "SELECT * FROM $tabela";
       return $this->selectDB($buscar);
    }
    public function getBuscarEventos($tabela){
        return $this->buscarEventos($tabela);
    }

}
