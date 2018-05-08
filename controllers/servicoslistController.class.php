<?php

class servicoslistController extends Controller {

    public function index () {
        $dados = array();

        $s = new Servicos();

        $dados['servicos'] = $s->listar();


        $this->setCss('assets/css/servicoslist.css');
        $this->setJs('assets/js/servicoslist.js');

        $this->loadTemplate('servicoslist', $dados);
    }

}