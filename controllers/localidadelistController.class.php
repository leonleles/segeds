<?php

class localidadelistController extends Controller {

    public function index () {
        $dados = array();

        $l = new Localidades();
        $municipios = $l->listarTodos();

        $dados['distritos'] = null;
        if (count($municipios) > 0) {
            $distritos = $l->selecionaDistritos($municipios[0]['id']);
            $dados['distritos'] = $distritos;
        }

        $dados['municipios'] = $municipios;

        $this->setCss('assets/css/localidadelist.css');
        $this->setJs('assets/js/localidadelist.js');

        $this->loadTemplate('localidadelist', $dados);
    }
}