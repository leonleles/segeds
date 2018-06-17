<?php

class solicitacoesController extends Controller {

    public function index () {
        $dados = array();

        $this->setCss('assets/css/solicitacoes.css');
        $this->setJs('assets/js/solicitacoes.js');

        $this->loadTemplate('solicitacoes', $dados);
    }

}