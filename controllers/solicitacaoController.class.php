<?php

class solicitacaoController extends Controller {

    public function index() {
        $dados = array();


        $this->loadTemplate('solicitacao', $dados);

    }
}